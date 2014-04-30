<?php
namespace Kairos\Bundle\GeoNameCityBundle\ORM\Query\AST\Functions\Mysql;

use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;

/**
 * Class Pow
 * @package Kairos\GeoNameCityBundle\ORM\Query\AST\Functions\Mysql
 */
class Pow extends FunctionNode
{
    /**
     * @var null
     */
    protected $numberExpression = null;

    /**
     * @var int
     */
    protected $powerExpression = 1;

    /**
     * @param Parser $parser
     */
    public function parse(Parser $parser)
    {
        //Check for correct
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->numberExpression = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_COMMA);
        $this->powerExpression = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    /**
     * @param SqlWalker $sqlWalker
     *
     * @return string
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        return 'POW(' .
            $this->numberExpression->dispatch($sqlWalker) . ', ' .
            $this->powerExpression->dispatch($sqlWalker) . ')';
    }
}