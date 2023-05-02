<?php

namespace MagDv\Dadata\Tests\Functional;

use MagDv\Dadata\CleanClient;

final class CleanTest extends BaseTest
{
    private ?CleanClient $api = null;
    protected function setUp(): void
    {
        parent::setUp();
        $this->api = new CleanClient($this->config);
    }

    public function testClean()
    {
        $expected = [
            'source' => 'Сережа',
            'result' => 'Сергей',
            'result_genitive' => 'Сергея',
            'result_dative' => 'Сергею',
            'result_ablative' => 'Сергеем',
            'surname' => null,
            'name' => 'Сергей',
            'patronymic' => null,
            'gender' => 'М',
            'qc' => 1,
        ];
        $actual = $this->api->clean("name", "Сережа");
        $this->assertEquals($actual, $expected);
    }

    public function testCleanRequest()
    {
        $actual = $this->api->clean("address", "москва");
        $expected = [
            'source' => 'москва',
            'result' => 'г Москва',
            'postal_code' => '101000',
            'country' => 'Россия',
            'country_iso_code' => 'RU',
            'federal_district' => 'Центральный',
            'region_fias_id' => '0c5b2444-70a0-4932-980c-b4dc0d3f02b5',
            'region_kladr_id' => '7700000000000',
            'region_iso_code' => 'RU-MOW',
            'region_with_type' => 'г Москва',
            'region_type' => 'г',
            'region_type_full' => 'город',
            'region' => 'Москва',
            'area_fias_id' => null,
            'area_kladr_id' => null,
            'area_with_type' => null,
            'area_type' => null,
            'area_type_full' => null,
            'area' => null,
            'city_fias_id' => null,
            'city_kladr_id' => null,
            'city_with_type' => null,
            'city_type' => null,
            'city_type_full' => null,
            'city' => null,
            'city_area' => null,
            'city_district_fias_id' => null,
            'city_district_kladr_id' => null,
            'city_district_with_type' => null,
            'city_district_type' => null,
            'city_district_type_full' => null,
            'city_district' => null,
            'settlement_fias_id' => null,
            'settlement_kladr_id' => null,
            'settlement_with_type' => null,
            'settlement_type' => null,
            'settlement_type_full' => null,
            'settlement' => null,
            'street_fias_id' => null,
            'street_kladr_id' => null,
            'street_with_type' => null,
            'street_type' => null,
            'street_type_full' => null,
            'street' => null,
            'house_fias_id' => null,
            'house_kladr_id' => null,
            'house_cadnum' => null,
            'house_type' => null,
            'house_type_full' => null,
            'house' => null,
            'block_type' => null,
            'block_type_full' => null,
            'block' => null,
            'entrance' => null,
            'floor' => null,
            'flat_fias_id' => null,
            'flat_cadnum' => null,
            'flat_type' => null,
            'flat_type_full' => null,
            'flat' => null,
            'flat_area' => null,
            'square_meter_price' => null,
            'flat_price' => null,
            'postal_box' => null,
            'fias_id' => '0c5b2444-70a0-4932-980c-b4dc0d3f02b5',
            'fias_code' => '77000000000000000000000',
            'fias_level' => '1',
            'fias_actuality_state' => '0',
            'kladr_id' => '7700000000000',
            'capital_marker' => '0',
            'okato' => '45000000000',
            'oktmo' => '45000000',
            'tax_office' => '7700',
            'tax_office_legal' => '7700',
            'timezone' => 'UTC+3',
            'geo_lat' => '55.7540471',
            'geo_lon' => '37.620405',
            'beltway_hit' => null,
            'beltway_distance' => null,
            'qc_geo' => 4,
            'qc_complete' => 3,
            'qc_house' => 10,
            'qc' => 0,
            'unparsed_parts' => null,
            'metro' => null,
            'stead_fias_id' => null,
            'stead_kladr_id' => null,
            'stead_cadnum' => null,
            'stead_type' => null,
            'stead_type_full' => null,
            'stead' => null,
        ];
        $this->assertEquals($expected, $actual);
    }

    public function testCleanRecord()
    {
        $structure = ["AS_IS", "AS_IS", "AS_IS"];
        $record = ["1", "2", "3"];
        $expected = [
            [
                "source" => "1",
            ],
            [
                "source" => "2",
            ],
            [
                "source" => "3",
            ]
        ];
        $actual = $this->api->cleanRecord($structure, $record);
        $this->assertEquals($actual, $expected);
    }
}
