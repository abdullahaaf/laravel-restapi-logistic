<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model;
use MongoDB\BSON\UTCDateTime;

class Package extends Model
{
    protected $connectin = 'mongodb';
    protected $collection = 'couriers';
    protected $fillable = ['transaction_id','customer_name','customer_code','transaction_amount','transaction_discount','transaction_additional_field','transaction_payment_type','transaction_state','transaction_code','transaction_order','location_id','organization_id','transaction_payment_type_name','transaction_cash_amount','transaction_cash_change','customer_attribute','connote','connote_id','origin_data','destination_data','koli_data','custom_field','current_location'];

    public function assertCustomerAttribute($payload)
    {
        return [
            'Nama_sales'        => $payload['customer_attribute']['Nama_Sales'],
            'TOP'               => $payload['customer_attribute']['TOP'],
            'Jenis_pelanggan'   => $payload['customer_attribute']['Jenis_Pelanggan']
        ];
    }

    public function assertConnote($payload)
    {
        return [
            'connote_id'                => $payload['connote_id'],
            'connote_number'            => $payload['connote']['connote_number'],
            'connote_service'           => $payload['connote']['connote_service'],
            'connote_service_price'     => $payload['connote']['connote_service_price'],
            'connote_amount'            => $payload['connote']['connote_amount'],
            'connote_code'              => $payload['connote']['connote_code'],
            'connote_booking_code'      => $payload['connote']['connote_booking_code'] ?? null,
            'connote_order'             => intval($payload['connote']['connote_order']),
            'connote_state'             => $payload['connote']['connote_state'],
            'connote_state_id'          => $payload['connote']['connote_state_id'],
            'zone_code_from'            => $payload['connote']['zone_code_from'],
            'zone_code_to'              => $payload['connote']['zone_code_to'],
            'surcharge_amount'          => $payload['connote']['surcharge_amount'] ?? null,
            'transaction_id'            => $payload['transaction_id'],
            'actual_weight'             => $payload['connote']['actual_weight'],
            'volume_weight'             => $payload['connote']['volume_weight'],
            'chargeable_weight'         => $payload['connote']['chargeable_weight'],
            'created_at'                => new UTCDateTime(),
            'updated_at'                => new UTCDateTime(),
            'organization_id'           => $payload['organization_id'],
            'location_id'               => $payload['location_id'],
            'connote_total_package'     => $payload['connote']['connote_total_package'],
            'connote_surcharge_amount'  => $payload['connote']['connote_surcharge_amount'],
            'connote_sla_day'           => $payload['connote']['connote_sla_day'],
            'location_name'             => $payload['connote']['location_name'],
            'location_type'             => $payload['connote']['location_type'],
            'source_tariff_db'          => $payload['connote']['source_tariff_db'],
            'id_source_tariff'          => $payload['connote']['id_source_tariff'],
            'pod'                       => $payload['connote']['pod'] ?? null,
            'history'                   => $payload['connote']['history']
        ];
    }

    public function assertTransactionData($payload)
    {
        return [
            'transaction_id'                => $payload['transaction_id'],
            'customer_name'                 => $payload['customer_name'],
            'customer_code'                 => $payload['customer_code'],
            'transaction_amount'            => $payload['transaction_amount'],
            'transaction_discount'          => $payload['transaction_discount'],
            'transaction_additional_field'  => $payload['transaction_additional_field'] ?? null,
            'transaction_payment_type'      => $payload['transaction_payment_type'],
            'transaction_state'             => $payload['transaction_state'],
            'transaction_code'              => $payload['transaction_code'],
            'transaction_order'             => $payload['transaction_order'],
            'location_id'                   => $payload['location_id'],
            'organization_id'               => $payload['organization_id'],
            'created_at'                    => new UTCDateTime(),
            'updated_at'                    => new UTCDateTime(),
            'transaction_payment_type_name' => $payload['transaction_payment_type_name'],
            'transaction_cash_amount'       => $payload['transaction_cash_amount'],
            'transaction_cash_change'       => $payload['transaction_cash_change'],
            'customer_attribute'            => $payload['customer_attribute'],
            'connote'                       => $payload['connote'],
            'connote_id'                    => $payload['connote_id'],
            'origin_data'                   => $payload['origin_data'],
            'destination_data'              => $payload['destination_data'],
            'koli_data'                     => $payload['koli_data'],
            'custom_field'                  => $payload['custom_field'],
            'currentLocation'               => $payload['currentLocation']
        ];
    }

    public function assertOriginData($payload)
    {
        return [
            'customer_name'             => $payload['origin_data']['customer_name'],
            'customer_address'          => $payload['origin_data']['customer_address'],
            'customer_email'            => $payload['origin_data']['customer_email'],
            'customer_phone'             => $payload['origin_data']['customer_phone'],
            'customer_address_detail'   => $payload['origin_data']['customer_address_detail'],
            'customer_zip_code'         => $payload['origin_data']['customer_zip_code'],
            'zone_code'                 => $payload['origin_data']['zone_code'],
            'organization_id'           => $payload['origin_data']['organization_id'],
            'location_id'               => $payload['location_id']
        ];
    }

    public function assertDestinationData($payload)
    {
        return [
            'customer_name' => $payload['destination_data']['customer_name'],
            'customer_address' => $payload['destination_data']['customer_address'],
            'customer_email'    => $payload['destination_data']['customer_email'] ?? null,
            'customer_phone'    => $payload['destination_data']['customer_phone'],
            'customer_address_detail' => $payload['destination_data']['customer_address_detail']
        ];
    }

    public function assertKoliData($payload)
    {
        return [
            'koli_length'   => $payload['koli_length'],
            'awb_url'       => $payload['awb_url'],
            'created_at'    => new UTCDateTime(),
            'koli_chargeable_weight'  => $payload['koli_chargeable_weight'],
            'koli_width'            => $payload['koli_width'],
            'koli_surcharge'        => $payload['koli_surcharge'],
            'koli_height'           => $payload['koli_height'],
            'updated_at'            => new UTCDateTime(),
            'koli_description'      => $payload['koli_description'],
            'koli_formula_id'       => $payload['koli_formula_id'] ?? null,
            'connote_id'            => $payload['connote_id'],
            'koli_volume'           => $payload['koli_volume'],
            'koli_weight'           => $payload['koli_weight'],
            'koli_id'               => $payload['koli_id'],
            'koli_custom_field'     => $payload['koli_custom_field'],
            'koli_code'             => $payload['koli_code']
        ];
    }

    public function getAllData()
    {
        return DB::collection('couriers')
        ->project(['_id' => 0])
        ->get();
    }

    public function getSpecificData($customerCode)
    {
        $package = DB::collection('couriers')->where('customer_code', $customerCode)->get();
        if ($package->isEmpty()) {
            return [];
        } else {
            return DB::collection('couriers')->where('customer_code', $customerCode)
            ->project(['_id' => 0])
            ->get();
        }
    }

    public function updateDocument($customerCode, $payload)
    {
        return DB::collection('couriers')
        ->where('customer_code', $customerCode)
        ->update($payload, ['upsert' => false]);
    }

    public function deleteDocument($customerCode)
    {
        return DB::collection('couriers')
        ->where('customer_code', $customerCode)
        ->delete();
    }

    public function addKoliData($customerCode, $newKoliData)
    {
        return DB::collection('couriers')
        ->where('customer_code', $customerCode)
        ->push('koli_data', $newKoliData);
    }
}
