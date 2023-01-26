<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Package;

class PackageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public $payload = array
    (
        "customer_name" => "PT. AMARA PRIMASATU",
        "customer_code" => "1678593",
        "transaction_amount"=> "70700",
        "transaction_discount"=> "0",
        "transaction_additional_field"=> "",
        "transaction_payment_type"=> "29",
        "transaction_state"=> "PAID",
        "transaction_code"=> "CGKFT20200715121",
        "transaction_order"=> 121,
        "organization_id"=> 6,
        "created_at"=> "2020-07-15T11=>11=>12+0700",
        "updated_at"=> "2020-07-15T11=>11=>22+0700",
        "transaction_payment_type_name"=> "Invoice",
        "transaction_cash_amount"=> 0,
        "transaction_cash_change"=> 0,
        "customer_attribute"=> [
            "Nama_Sales" => "Radit Fitrawikarsa",
            "TOP"=> "14 Hari",
            "Jenis_Pelanggan"=> "B2B"
        ],
        "connote"=> [
            "connote_number"=> 1,
            "connote_service"=> "ECO",
            "connote_service_price"=> 70700,
            "connote_amount"=> 70700,
            "connote_code"=> "AWB00100209082020",
            "connote_booking_code"=> "",
            "connote_order"=> 326931,
            "connote_state"=> "PAID",
            "connote_state_id"=> 2,
            "zone_code_from"=> "CGKFT",
            "zone_code_to"=> "SMG",
            "surcharge_amount"=> null,
            "actual_weight"=> 20,
            "volume_weight"=> 0,
            "chargeable_weight"=> 20,
            "created_at"=> "2020-07-15T11=>11=>12+0700",
            "updated_at"=> "2020-07-15T11=>11=>22+0700",
            "organization_id"=> 6,
            "connote_total_package"=> "3",
            "connote_surcharge_amount"=> "0",
            "connote_sla_day"=> "4",
            "location_name"=> "Hub Jakarta Selatan",
            "location_type"=> "HUB",
            "source_tariff_db"=> "tariff_customers",
            "id_source_tariff"=> "1576868",
            "pod"=> null,
            "history"=> []
        ],
        "origin_data"=> [
            "customer_name"=> "PT. NARA OKA PRAKARSA",
            "customer_address"=> "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
            "customer_email"=> "info@naraoka.co.id",
            "customer_phone"=> "024-1234567",
            "customer_address_detail"=> null,
            "customer_zip_code"=> "12420",
            "zone_code"=> "CGKFT",
            "organization_id"=> 6
        ],
        "destination_data"=> [
            "customer_name" => "PT AMARIS HOTEL SIMPANG LIMA",
            "customer_address"=> "JL. KH. AHMAD DAHLAN NO. 01, SEMARANG TENGAH",
            "customer_phone"=> "0248453499",
            "customer_address_detail"=> "KOTA SEMARANG SEMARANG TENGAH KARANGKIDUL",
            "customer_zip_code"=> "50241",
            "zone_code"=> "SMG",
            "organization_id"=> 6
        ],
        "koli_data"=> [
            [
                "koli_length"=> 0,
                "awb_url"=> "https=>\/\/tracking.mile.app\/label\/AWB00100209082020.1",
                "created_at"=> "2020-07-15 11=>11=>13",
                "koli_chargeable_weight"=> 9,
                "koli_width"=> 0,
                "koli_surcharge"=> [],
                "koli_height"=> 0,
                "updated_at"=> "2020-07-15 11=>11=>13",
                "koli_description"=> "V WARP",
                "koli_formula_id"=> null,
                "connote_id"=> "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                "koli_volume"=> 0,
                "koli_weight"=> 9,
                "koli_id"=> "e2cb6d86-0bb9-409b-a1f0-389ed4f2df2d",
                "koli_custom_field"=> [
                    "awb_sicepat"=> null,
                    "harga_barang"=> null
                ],
                "koli_code"=> "AWB00100209082020.1"
            ],
            [
                "koli_length"=> 0,
                "awb_url"=> "https=>\/\/tracking.mile.app\/label\/AWB00100209082020.2",
                "created_at"=> "2020-07-15 11=>11=>13",
                "koli_chargeable_weight"=> 9,
                "koli_width"=> 0,
                "koli_surcharge"=> [],
                "koli_height"=> 0,
                "updated_at"=> "2020-07-15 11=>11=>13",
                "koli_description"=> "V WARP",
                "koli_formula_id"=> null,
                "connote_id"=> "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                "koli_volume"=> 0,
                "koli_weight"=> 9,
                "koli_id"=> "3600f10b-4144-4e58-a024-cc3178e7a709",
                "koli_custom_field"=> [
                    "awb_sicepat"=> null,
                    "harga_barang"=> null
                ],
                "koli_code"=> "AWB00100209082020.2"
            ],
            [
                "koli_length"=> 0,
                "awb_url"=> "https=>\/\/tracking.mile.app\/label\/AWB00100209082020.3",
                "created_at"=> "2020-07-15 11=>11=>13",
                "koli_chargeable_weight"=> 2,
                "koli_width"=> 0,
                "koli_surcharge"=> [],
                "koli_height"=> 0,
                "updated_at"=> "2020-07-15 11=>11=>13",
                "koli_description"=> "LID HOT CUP",
                "koli_formula_id"=> null,
                "connote_id"=> "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                "koli_volume"=> 0,
                "koli_weight"=> 2,
                "koli_id"=> "2937bdbf-315e-4c5e-b139-fd39a3dfd15f",
                "koli_custom_field"=> [
                    "awb_sicepat"=> null,
                    "harga_barang"=> null
                ],
                "koli_code"=> "AWB00100209082020.3"
            ]
        ],
        "custom_field"=> [
            "catatan_tambahan"=> "JANGAN DI BANTING \/ DI TINDIH"
        ],
        "currentLocation"=> [
            "name"=> "Hub Jakarta Selatan",
            "code"=> "JKTS01",
            "type"=> "Agent"
        ]
    );

    public $payloadKoliData = [
        "koli_length" => 0,
        "awb_url" => "https=>\/\/tracking.mile.app\/label\/AWB00100209082020.1",
        "created_at" => "2020-07-15 11=>11=>13",
        "koli_chargeable_weight" => 9,
        "koli_width" => 0,
        "koli_surcharge" => [],
        "koli_height" => 0,
        "updated_at" => "2020-07-15 11=>11=>13",
        "koli_description" => "V WARP",
        "koli_formula_id" => null,
        "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
        "koli_volume" => 0,
        "koli_weight" => 9,
        "koli_id" => "e2cb6d86-0bb9-409b-a1f0-389ed4f2df2d",
        "koli_custom_field" => [
            "awb_sicepat" => null,
            "harga_barang" => null
        ],
        "koli_code" => "AWB00100209082020.1"
    ];

    public $wrongCustomerCode = 17986;
    public $customerCode = 1678593;

    public function test_json_structure_when_get_all_data()
    {
        $response = $this->json('GET', 'api/packages');
        $response->assertStatus(200)
        ->assertJsonStructure(['code' => 'message'])
        ->assertJsonStructure(['code' => 'data']);
    }

    public function test_response_code_when_empty_data()
    {
        $response = $this->get('api/packages/'.$this->wrongCustomerCode);
        $response->assertStatus(204);
    }

    public function test_create_new_transaction_and_with_some_removed_payload()
    {
        unset($this->payload['customer_name']);
        unset($this->payload['koli_data']);
        $response =  $this->json('POST', 'api/packages', $this->payload);
        $response->assertStatus(400)
        ->assertJson([
            'error' => [],
        ]);
    }

    public function test_create_new_transaction_with_payload_provided()
    {
        $response =  $this->json('POST', 'api/packages', $this->payload);
        $response->assertStatus(201)
        ->assertJson([
            'message' => 'Success create transaction',
            'data' => []
        ]);
    }

    public function test_update_certain_transaction_with_wrong_customer_code()
    {
        $response = $this->json('PUT', 'api/packages/'.$this->wrongCustomerCode, $this->payload);
        $response->assertStatus(204);
    }

    public function test_update_certain_transaction()
    {
        $response = $this->json('PUT', 'api/packages/' . $this->customerCode, $this->payload);
        $response->assertStatus(201)
        ->assertJson([
            'message' => 'Success update transaction',
            'data' => []
        ]);
    }

    public function test_add_koli_data_with_wrong_customer_code()
    {
        $response = $this->json('PATCH', 'api/kolidata/'.$this->wrongCustomerCode, $this->payloadKoliData);
        $response->assertStatus(204);
    }

    public function test_add_koli_data_with_()
    {
        $response = $this->json('PATCH', 'api/kolidata/' . $this->customerCode, $this->payloadKoliData);
        $response->assertStatus(201)
        ->assertJson([
            'message' => 'Success add kolidata',
            'data' => []
        ]);
    }

    public function test_delete_certain_transaction_with_wrong_customer_code()
    {
        $response = $this->json('DELETE', 'api/packages/' . $this->wrongCustomerCode);
        $response->assertStatus(204);
    }

    public function test_delete_certain_transaction()
    {
        $response = $this->json('DELETE', 'api/packages/' . $this->customerCode);
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Success delete transaction',
                'data' => []
            ]);
    }
}
