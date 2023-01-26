<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use MongoDB\BSON\ObjectId;

class PackageController extends Controller
{

    public function index()
    {
        $packageModel = new Package();
        $package = $packageModel->getAllData();

        return $this->apiResponse("Success fetch data", $package, 200);
    }

    public function show($customerCode)
    {
        $packageModel = new Package();
        $package = $packageModel->getSpecificData($customerCode);
        if (empty($package)) {
            return response()->json([], 204);
        } else {
            $message = "Success fetch data";
            $statusCode = 200;
        }

        return $this->apiResponse($message, $package, $statusCode);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), config('validation.validateTransaction'));

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $payload = $request->all();

        $transactionData = $this->redefineTransactionData($payload);
        $store = Package::create($transactionData);

        if ($store) {
            return $this->apiResponse("Success create transaction", $payload, 201);
        }
    }

    public function update(Request $request, $customerCode)
    {
        $validator = Validator::make($request->all(), config('validation.validateTransaction'));
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $packageModel = new Package();
        $package = $packageModel->getSpecificData($customerCode);
        if (empty($package)) {
            return response()->json([], 204);
        } else {
            $payload = $request->all();
            $payload['transaction_id'] = $package[0]['transaction_id'];
            $payload['connote_id'] = $package[0]['connote_id'];
            $payload['location_id'] = $package[0]['location_id'];
            $payload['koli_data'] = $this->redefineKoliData($payload, $packageModel);
            $payload['customer_attribute'] = $this->redefineCustomerAttributeData($payload, $packageModel);
            $payload['connote'] = $this->redefineConnoteData($payload, $packageModel);
            $payload['origin_data'] = $this->redefineOriginData($payload, $packageModel);
            $payload['destination_data'] = $this->redefineDestinationData($payload, $packageModel);

            $packageModel->updateDocument($customerCode, $payload);
            return $this->apiResponse("Success update transaction", $payload, 201);
        }
    }

    public function destroy($customerCode)
    {
        $packageModel = new Package();
        $package = $packageModel->getSpecificData($customerCode);
        if (empty($package)) {
            return response()->json([], 204);
        } else {
            $packageModel->deleteDocument($customerCode);
            return $this->apiResponse("Success delete transaction", [], 200);
        }
    }

    public function addKoliData(Request $request, $customerCode)
    {
        $packageModel = new Package();
        $package = $packageModel->getSpecificData($customerCode);
        if (empty($package)) {
            return response()->json([], 204);
        } else {
            $validator = Validator::make($request->all(), config('validation.validateKoliData'));
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }
            $payload = $request->all();
            $payload['connote_id'] = $package[0]['connote_id'];
            $newKoliData = $packageModel->assertKoliData($payload);
            $store = $packageModel->addKoliData($customerCode, $newKoliData);
            if ($store) {
                return $this->apiResponse("Success add kolidata", $payload, 201);

            }
        }
    }

    private function generateUUID()
    {
        $guid = Uuid::uuid4();
        return $guid->toString();
    }

    private function generateObjectId()
    {
        return new ObjectId();
    }

    private function redefineTransactionData($payload)
    {
        $packageModel = new Package();
        $payload['transaction_id'] = $this->generateUUID();
        $payload['connote_id'] = $this->generateUUID();
        $payload['location_id'] = $this->generateObjectId();

        $payload['koli_data'] = $this->redefineKoliData($payload, $packageModel);
        $payload['customer_attribute'] = $this->redefineCustomerAttributeData($payload, $packageModel);
        $payload['connote'] = $this->redefineConnoteData($payload, $packageModel);
        $payload['origin_data'] = $this->redefineOriginData($payload, $packageModel);
        $payload['destination_data'] = $this->redefineDestinationData($payload, $packageModel);

        return $packageModel->assertTransactionData($payload);
    }

    private function redefineKoliData($payload, $packageModel)
    {
        $koliData = [];
        foreach ($payload['koli_data'] as $value) {
            $payload['koli_data']['connote_id'] = $payload['connote_id'];
            $value['connote_id'] = $payload['connote_id'];
            array_push($koliData, $packageModel->assertKoliData($value));
        }
        return $koliData;
    }

    private function redefineConnoteData($payload, $packageModel)
    {
        return $packageModel->assertConnote($payload);
    }

    private function redefineCustomerAttributeData($payload, $packageModel)
    {
        return $packageModel->assertCustomerAttribute($payload);
    }

    private function redefineOriginData($payload, $packageModel)
    {
        return $packageModel->assertOriginData($payload);
    }

    private function redefineDestinationData($payload, $packageModel)
    {
        return $packageModel->assertDestinationData($payload);
    }
}
