<?php
namespace Kairos\Bundle\GeoNameCityBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use CrEOF\Spatial\PHP\Types\Geometry\Point;
use Kairos\Bundle\GeoNameCityBundle\Entity\GeoNameCity;

class UpdateGeoNameCityCommand extends ContainerAwareCommand
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    protected function configure()
    {
        parent::configure();

        $this->setName('kairos:update-geonamecity')
            ->setDescription('Update the geo name city table with the config url file')
            ->setHelp(
                <<<EOT
                The <info>kairos:update-geonamecity</info> command update the geo name city table with the config url file

                <info>php app/console kairos:update-geonamecity</info>
EOT
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();
    }

    /**
     * Downlaod the gnc file
     * Reset the gnc table
     * Read the file and insert data into gnc table
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null
     * @throws \RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            // Download and get the geo name city file from the source url
            $sourceUrl = $this->getContainer()->getParameter("kairos_geo_name.source_url");
            $output->writeln(sprintf('Downloading geo name city file from the source url:  <comment>%s</comment>', $sourceUrl));
            $file = $this->downloadAndGetGNCFile($sourceUrl);

            $output->writeln(sprintf('Resetting the geo name city table.'));
            if ($this->resetGeoNameCityTable()) {

                // batch size that flush the insert every 1000 persist
                $batchFlush = 1000;
                $countFlush = 1;

                $output->writeln(sprintf('Inserting values from file into geo name city table.'));
                while (!$file->eof()) {
                    // Get the value of the row and parse them into an array
                    $row = str_getcsv($file->fgets(), "\t");

                    /*
                     * The value mandatory are: (geoNameId, latitude, longitude, timezone)
                     * If you need the list of the fields look into the GeoNameCity
                     * Else @link http://download.geonames.org/export/dump/readme.txt
                     */
                    if (!empty($row[0]) && !empty($row[4]) && !empty($row[5]) && !empty($row[17])) {
                        $geoNameCity = $this->newGeoNameCity($row);
                        $this->em->persist($geoNameCity);

                        if (($countFlush % $batchFlush) == 0) {
                            $this->em->flush();
                            $this->em->clear();
                        }
                        $countFlush++;
                    }
                    $file->next();
                }
                $this->em->flush();
            }

        } catch (\Exception $e) {
            throw new \RuntimeException($e->getCode() . ': ' . $e->getMessage());
        }

        return 0;
    }

    /**
     * Create a GeoNameCity entity with the values
     *
     * @param $data
     * @return GeoNameCity
     */
    private function newGeoNameCity($data)
    {
        $geoNameCity = new GeoNameCity();
        $geoNameCity->setGeoNameId($data[0]);
        $geoNameCity->setName(!empty($data[1]) ? $data[1] : null);
        $geoNameCity->setAsciiName(!empty($data[2]) ? $data[2] : null);
        $geoNameCity->setAlternateNames(!empty($data[3]) ? $data[3] : null);
        $geoNameCity->setLatitude($data[4]);
        $geoNameCity->setLongitude($data[5]);
        $geoNameCity->setCoordinates(new Point($geoNameCity->getLongitude(), $geoNameCity->getLatitude()));
        $geoNameCity->setFeatureClass(!empty($data[6]) ? $data[6] : null);
        $geoNameCity->setFeatureCode(!empty($data[7]) ? $data[7] : null);
        $geoNameCity->setCountryCode(!empty($data[8]) ? $data[8] : null);
        $geoNameCity->setCc2(!empty($data[9]) ? $data[9] : null);;
        $geoNameCity->setAdmin1Code(!empty($data[10]) ? $data[10] : null);
        $geoNameCity->setAdmin2Code(!empty($data[11]) ? $data[11] : null);
        $geoNameCity->setAdmin3Code(!empty($data[12]) ? $data[12] : null);
        $geoNameCity->setAdmin4Code(!empty($data[13]) ? $data[13] : null);
        $geoNameCity->setPopulation(!empty($data[14]) ? $data[14] : null);
        $geoNameCity->setElevation(!empty($data[15]) ? $data[15] : null);
        $geoNameCity->setDem(!empty($data[16]) ? $data[16] : null);
        $geoNameCity->setTimezone($data[17]);

        return $geoNameCity;
    }

    /**
     * Reset the geo name city table before the insertion. We a rollback if there is an error
     *
     * @return bool
     * @throws \RuntimeException
     */
    private function resetGeoNameCityTable()
    {
        $cmd = $this->em->getClassMetadata('Kairos\GeoNameCityBundle\Entity\GeoNameCity');
        $connection = $this->em->getConnection();
        $connection->beginTransaction();

        try {
            $connection->query('DELETE FROM ' . $cmd->getTableName());
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
            throw new \RuntimeException($e->getCode() . ': ' . $e->getMessage());
        }

        return true;
    }

    /**
     * Download the geo name city from the source url (config)
     * Then extract the file and return it
     *
     * @return \SplFileObject
     */
    private function downloadAndGetGNCFile($sourceUrl)
    {
        $cacheDir = $this->getContainer()->getParameter("kernel.cache_dir") . '/geo_name_city';

        // Create the cache dir to keep the downloaded file
        @mkdir($cacheDir);

        // Download the zip file
        $client = new \Guzzle\Http\Client();
        $response = $client->get($sourceUrl)
            ->setResponseBody($cacheDir . '/cities.zip')
            ->send();

        // Extract the zip and get the filename of the file inside
        $filename = null;
        $zip = new \ZipArchive;
        if ($zip->open($cacheDir . '/cities.zip') === true) {
            $filename = $zip->getNameIndex(0);
            $zip->extractTo($cacheDir);
            $zip->close();
        }

        // Open the file in order to read it
        $file = new \SplFileObject($cacheDir . '/' . $filename);

        return $file;
    }

}