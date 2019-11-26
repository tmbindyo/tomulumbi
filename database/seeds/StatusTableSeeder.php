<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Project status
        DB::table('statuses')->insert([
            'id' => 'f6654b11-8f04-4ac9-993f-116a8a6ecaae',
            'name' => 'Ongoing',
            'label' => 'label-danger',
            'description' => 'Ongoing',
            'status_type_id' => 'e6dc4713-612f-455e-a30c-3e29ebdddf70',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '0fa108dc-22b6-40d9-911b-f692ec90e4a4',
            'name' => 'Preview',
            'label' => 'label-warning',
            'description' => 'Preview',
            'status_type_id' => 'e6dc4713-612f-455e-a30c-3e29ebdddf70',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'a6c4c2cc-95ca-4ecf-8ce3-3d08512aad15',
            'name' => 'Completed',
            'label' => 'label-success',
            'description' => 'Completed',
            'status_type_id' => 'e6dc4713-612f-455e-a30c-3e29ebdddf70',
            'user_id' => 1,
        ]);


        // Record status
        DB::table('statuses')->insert([
            'id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'name' => 'Active',
            'label' => 'label-primary',
            'description' => 'Active record',
            'status_type_id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '402c447e-939f-41b3-bf4b-82a3faecc3db',
            'name' => 'Inactive',
            'label' => 'label-warning',
            'description' => 'Inactive record',
            'status_type_id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a',
            'name' => 'Deleted',
            'label' => 'label-danger',
            'description' => 'Deleted record',
            'status_type_id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'user_id' => 1,
        ]);


        // Image or album or design or journal or project status
        DB::table('statuses')->insert([
            'id' => 'cad5abf4-ed94-4184-8f7a-fe5084fb7d56',
            'name' => 'Preview',
            'label' => 'label-warning',
            'description' => 'Preview album or image',
            'status_type_id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '389842b7-a010-40c1-85cf-4f5b5144ccea',
            'name' => 'Hidden',
            'label' => 'label-info',
            'description' => 'Hidden album or image',
            'status_type_id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5',
            'name' => 'Published',
            'label' => 'label-success',
            'description' => 'Published album or image',
            'status_type_id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'user_id' => 1,
        ]);


        // statuses for to dos
        DB::table('statuses')->insert([
            'id' => 'f3df38e3-c854-4a06-be26-43dff410a3bc',
            'name' => 'Pending',
            'description' => 'Pending',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '2a2d7a53-0abd-4624-b7a1-a123bfe6e568',
            'name' => 'In progress',
            'description' => 'In progress',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'facb3c47-1e2c-46e9-9709-ca479cc6e77f',
            'name' => 'Completed',
            'label' => 'label-primary',
            'description' => 'Completed',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '99372fdc-9ca0-4bca-b483-3a6c95a73782',
            'name' => 'Overdue',
            'description' => 'Overdue',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
        ]);


        // Email
        DB::table('statuses')->insert([
            'id' => '9c267c79-162e-4ae1-9340-57a4c5ca5e81',
            'name' => 'Unread',
            'label' => 'label-warning',
            'description' => 'Unread',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'f7c44dec-2fca-4807-a500-364430240167',
            'name' => 'Seen',
            'label' => 'label-info',
            'description' => 'Seen',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '33a90a31-d779-41ec-ae2b-11649119f496',
            'name' => 'Read',
            'label' => 'label-primary',
            'description' => 'Read',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '25743169-a5f2-4e71-878d-6c6ef02dfb08',
            'name' => 'Replied',
            'label' => 'label-success',
            'description' => 'Replied',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'b911d833-c581-4e59-bfd0-72ea1becf544',
            'name' => 'Flagged',
            'label' => 'label-danger',
            'description' => 'Flagged',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
        ]);


        // Product statuses
        DB::table('statuses')->insert([
            'id' => 'f1a32788-4016-4104-804b-92186b340eb0',
            'name' => 'Preview',
            'label' => 'label-warning',
            'description' => 'Product cannot be ordered when set to this status but will be shown still. ',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '2ae05f4d-318d-4475-a9b0-a648694eb5c2',
            'name' => 'Unavailable',
            'label' => 'label-warning',
            'description' => 'Product cannot be ordered when set to this status but will be shown still. ',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '6749f50e-1be5-412e-ac14-58b0ddba6be3',
            'name' => 'Back Order',
            'label' => 'label-danger',
            'description' => 'Products with this flag are able to be back ordered, which means their current stock count can go negative.',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '597936fd-5f53-4b9f-8981-6f567ab992d5',
            'name' => 'Archived',
            'label' => 'label-plain',
            'description' => 'Products with this flag will not be shown in the catalog.',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '484c6218-e7c8-4e77-b548-82d45d8873b3',
            'name' => 'Discontinued',
            'label' => 'label-danger',
            'description' => 'Viewed',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'e5d06435-7df5-45dd-a4e9-e57f538b8366',
            'name' => 'Live',
            'label' => 'label-success',
            'description' => 'Live',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
        ]);


        // Order
        DB::table('statuses')->insert([
            'id' => 'e2f5f913-f0df-4749-9053-ea2ab8a89547',
            'name' => 'Pending',
            'description' => 'Customer started the checkout process but did not complete it. Incomplete orders are assigned a "Pending" status and can be found under the More tab in the View Orders screen.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '39c51a73-063f-48d6-b0ce-c86f2a0f7cdd',
            'name' => 'Awaiting Payment',
            'description' => 'Customer has completed the checkout process, but payment has yet to be confirmed. Authorize only transactions that are not yet captured have this status.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '66e71792-5289-4554-ba69-97933dfb1e49',
            'name' => 'Awaiting Fulfillment',
            'description' => ' Customer has completed the checkout process and payment has been confirmed.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '5e86e6f3-2972-4886-bd8f-4b0dd16af97a',
            'name' => 'Awaiting Shipment',
            'description' => ' Order has been pulled and packaged and is awaiting collection from a shipping provider.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'd456e5e5-9e7b-429a-a376-c3ea5ea908cd',
            'name' => 'Awaiting Pickup',
            'description' => 'Order has been packaged and is awaiting customer pickup from a seller-specified location.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'ad7e83d4-e051-42f7-8feb-60176f027901',
            'name' => 'Partially Shipped',
            'description' => 'Only some items in the order have been shipped, due to some products being pre-order only or other reasons.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '19bc0cb0-9565-4280-a992-cb0a530a0a51',
            'name' => 'Completed',
            'description' => 'Order has been shipped/picked up, and receipt is confirmed; client has paid for their digital product, and their file(s) are available for download.',
            'label' => 'label-success',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'cdbc4045-d03c-4b13-8432-b430f4c70b88',
            'name' => 'Shipped',
            'description' => 'Order has been shipped, but receipt has not been confirmed; seller has used the Ship Items action. A listing of all orders with a "Shipped" status can be found under the More tab of the View Orders screen.',
            'label' => 'label-success',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'd228f839-2378-49d1-90b7-eb31dc4cc946',
            'name' => 'Cancelled',
            'description' => 'Seller has cancelled an order, due to a stock inconsistency or other reasons. Stock levels will automatically update depending on your Inventory Settings. Cancelling an order will not refund the order. This status is triggered automatically when an order using an authorize-only payment gateway is voided in the control panel before capturing payment.',
            'label' => 'label-danger',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '91934c68-da79-4d52-a94d-c83ceccea43d',
            'name' => 'Declined',
            'description' => 'Seller has marked the order as declined for lack of manual payment, or other reasons',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'e4db1356-dc9e-43d8-aef3-ca8988885928',
            'name' => 'Refunded',
            'description' => ' Seller has used the Refund action. A listing of all orders with a "Refunded" status can be found under the More tab of the View Orders screen.',
            'label' => 'label-info',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'a1b1b8a1-4dba-420e-b4a8-686134da8b1c',
            'name' => 'Disputed',
            'description' => 'Customer has initiated a dispute resolution process for the PayPal transaction that paid for the order.',
            'label' => 'label-danger',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '4a531fe5-bd9e-44c9-a630-84e6b979d599',
            'name' => 'Manual Verification Required',
            'description' => 'Order on hold while some aspect (e.g. tax-exempt documentation) needs to be manually confirmed. Orders with this status must be updated manually. Capturing funds or other order actions will not automatically update the status of an order marked Manual Verification Required.',
            'label' => 'label-plain',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'ff20d28a-90fc-472c-8219-5ba865c9880e',
            'name' => 'Partially Refunded',
            'description' => 'Seller has partially refunded the order.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
        ]);


        // Sales
        DB::table('statuses')->insert([
            'id' => 'ab95912f-1a23-4443-b822-4159adb1185a',
            'name' => 'To Do',
            'description' => 'To Do.',
            'label' => 'label-warning',
            'status_type_id' => 'a2fd6d40-969f-41a8-ba35-f7aad59307d7',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '7dd005e0-54b5-481d-a135-64286fd381f6',
            'name' => 'Standby',
            'description' => 'Standby.',
            'label' => 'label-danger',
            'status_type_id' => 'a2fd6d40-969f-41a8-ba35-f7aad59307d7',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'b6d97a8a-6c38-4f3b-9435-3d5c8ccbe9ce',
            'name' => 'Won',
            'description' => 'Won.',
            'label' => 'label-success',
            'status_type_id' => 'a2fd6d40-969f-41a8-ba35-f7aad59307d7',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => '9bf16fa3-fab4-42c9-97cb-ee8343e84bfc',
            'name' => 'Lost',
            'description' => 'Lost.',
            'label' => 'label-info',
            'status_type_id' => 'a2fd6d40-969f-41a8-ba35-f7aad59307d7',
            'user_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'id' => 'd30625aa-8b2d-4f08-b6e6-a45e4ee22d5a',
            'name' => 'Cancelled',
            'description' => 'Cancelled.',
            'label' => 'label-primary',
            'status_type_id' => 'a2fd6d40-969f-41a8-ba35-f7aad59307d7',
            'user_id' => 1,
        ]);




    }
}
