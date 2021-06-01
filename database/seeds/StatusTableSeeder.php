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
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '0fa108dc-22b6-40d9-911b-f692ec90e4a4',
            'name' => 'Preview',
            'label' => 'label-warning',
            'description' => 'Preview',
            'status_type_id' => 'e6dc4713-612f-455e-a30c-3e29ebdddf70',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'a6c4c2cc-95ca-4ecf-8ce3-3d08512aad15',
            'name' => 'Completed',
            'label' => 'label-success',
            'description' => 'Completed',
            'status_type_id' => 'e6dc4713-612f-455e-a30c-3e29ebdddf70',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Record status
        DB::table('statuses')->insert([
            'id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'name' => 'Active',
            'label' => 'label-primary',
            'description' => 'Active record',
            'status_type_id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '402c447e-939f-41b3-bf4b-82a3faecc3db',
            'name' => 'Inactive',
            'label' => 'label-warning',
            'description' => 'Inactive record',
            'status_type_id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a',
            'name' => 'Deleted',
            'label' => 'label-danger',
            'description' => 'Deleted record',
            'status_type_id' => 'a558001b-69ae-4872-ba0f-ecadd154a70a',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Image or album or design or journal or project status
        DB::table('statuses')->insert([
            'id' => 'cad5abf4-ed94-4184-8f7a-fe5084fb7d56',
            'name' => 'Preview',
            'label' => 'label-warning',
            'description' => 'Preview album or image',
            'status_type_id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '389842b7-a010-40c1-85cf-4f5b5144ccea',
            'name' => 'Hidden',
            'label' => 'label-info',
            'description' => 'Hidden album or image',
            'status_type_id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5',
            'name' => 'Published',
            'label' => 'label-success',
            'description' => 'Published album or image',
            'status_type_id' => '12a49330-14a5-41d2-b62d-87cdf8b252f8',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // statuses for to dos
        DB::table('statuses')->insert([
            'id' => 'f3df38e3-c854-4a06-be26-43dff410a3bc',
            'name' => 'Pending',
            'description' => 'Pending',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '2a2d7a53-0abd-4624-b7a1-a123bfe6e568',
            'name' => 'In progress',
            'description' => 'In progress',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'facb3c47-1e2c-46e9-9709-ca479cc6e77f',
            'name' => 'Completed',
            'label' => 'label-primary',
            'description' => 'Completed',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '99372fdc-9ca0-4bca-b483-3a6c95a73782',
            'name' => 'Overdue',
            'description' => 'Overdue',
            'status_type_id' => '1a252cab-df69-44f4-8cea-1d9d9e388a99',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Email
        DB::table('statuses')->insert([
            'id' => '9c267c79-162e-4ae1-9340-57a4c5ca5e81',
            'name' => 'Unread',
            'label' => 'label-warning',
            'description' => 'Unread',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'f7c44dec-2fca-4807-a500-364430240167',
            'name' => 'Seen',
            'label' => 'label-info',
            'description' => 'Seen',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '33a90a31-d779-41ec-ae2b-11649119f496',
            'name' => 'Read',
            'label' => 'label-primary',
            'description' => 'Read',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '25743169-a5f2-4e71-878d-6c6ef02dfb08',
            'name' => 'Replied',
            'label' => 'label-success',
            'description' => 'Replied',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'b911d833-c581-4e59-bfd0-72ea1becf544',
            'name' => 'Flagged',
            'label' => 'label-danger',
            'description' => 'Flagged',
            'status_type_id' => '5e230684-dc16-4889-a3d3-9e734726f02a',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Product statuses
        DB::table('statuses')->insert([
            'id' => 'f1a32788-4016-4104-804b-92186b340eb0',
            'name' => 'Preview',
            'label' => 'label-warning',
            'description' => 'Product cannot be ordered when set to this status but will be shown still. ',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '2ae05f4d-318d-4475-a9b0-a648694eb5c2',
            'name' => 'Unavailable',
            'label' => 'label-warning',
            'description' => 'Product cannot be ordered when set to this status but will be shown still. ',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '6749f50e-1be5-412e-ac14-58b0ddba6be3',
            'name' => 'Back Order',
            'label' => 'label-danger',
            'description' => 'Products with this flag are able to be back ordered, which means their current stock count can go negative.',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '597936fd-5f53-4b9f-8981-6f567ab992d5',
            'name' => 'Archived',
            'label' => 'label-plain',
            'description' => 'Products with this flag will not be shown in the catalog.',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '484c6218-e7c8-4e77-b548-82d45d8873b3',
            'name' => 'Discontinued',
            'label' => 'label-danger',
            'description' => 'Viewed',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'e5d06435-7df5-45dd-a4e9-e57f538b8366',
            'name' => 'Live',
            'label' => 'label-success',
            'description' => 'Live',
            'status_type_id' => 'b7870001-b1f1-442d-8b7a-a9551b1fc239',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Order
        DB::table('statuses')->insert([
            'id' => 'e2f5f913-f0df-4749-9053-ea2ab8a89547',
            'name' => 'Pending',
            'description' => 'Customer started the checkout process but did not complete it. Incomplete orders are assigned a "Pending" status and can be found under the More tab in the View Orders screen.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '39c51a73-063f-48d6-b0ce-c86f2a0f7cdd',
            'name' => 'Awaiting Payment',
            'description' => 'Customer has completed the checkout process, but payment has yet to be confirmed. Authorize only transactions that are not yet captured have this status.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '66e71792-5289-4554-ba69-97933dfb1e49',
            'name' => 'Awaiting Fulfillment',
            'description' => ' Customer has completed the checkout process and payment has been confirmed.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '5e86e6f3-2972-4886-bd8f-4b0dd16af97a',
            'name' => 'Awaiting Shipment',
            'description' => ' Order has been pulled and packaged and is awaiting collection from a shipping provider.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'd456e5e5-9e7b-429a-a376-c3ea5ea908cd',
            'name' => 'Awaiting Pickup',
            'description' => 'Order has been packaged and is awaiting customer pickup from a seller-specified location.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'ad7e83d4-e051-42f7-8feb-60176f027901',
            'name' => 'Partially Shipped',
            'description' => 'Only some items in the order have been shipped, due to some products being pre-order only or other reasons.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '19bc0cb0-9565-4280-a992-cb0a530a0a51',
            'name' => 'Completed',
            'description' => 'Order has been shipped/picked up, and receipt is confirmed; client has paid for their digital product, and their file(s) are available for download.',
            'label' => 'label-success',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'cdbc4045-d03c-4b13-8432-b430f4c70b88',
            'name' => 'Shipped',
            'description' => 'Order has been shipped, but receipt has not been confirmed; seller has used the Ship Items action. A listing of all orders with a "Shipped" status can be found under the More tab of the View Orders screen.',
            'label' => 'label-success',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'd228f839-2378-49d1-90b7-eb31dc4cc946',
            'name' => 'Cancelled',
            'description' => 'Seller has cancelled an order, due to a stock inconsistency or other reasons. Stock levels will automatically update depending on your Inventory Settings. Cancelling an order will not refund the order. This status is triggered automatically when an order using an authorize-only payment gateway is voided in the control panel before capturing payment.',
            'label' => 'label-danger',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '91934c68-da79-4d52-a94d-c83ceccea43d',
            'name' => 'Declined',
            'description' => 'Seller has marked the order as declined for lack of manual payment, or other reasons',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'e4db1356-dc9e-43d8-aef3-ca8988885928',
            'name' => 'Refunded',
            'description' => ' Seller has used the Refund action. A listing of all orders with a "Refunded" status can be found under the More tab of the View Orders screen.',
            'label' => 'label-info',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'a1b1b8a1-4dba-420e-b4a8-686134da8b1c',
            'name' => 'Disputed',
            'description' => 'Customer has initiated a dispute resolution process for the PayPal transaction that paid for the order.',
            'label' => 'label-danger',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '4a531fe5-bd9e-44c9-a630-84e6b979d599',
            'name' => 'Manual Verification Required',
            'description' => 'Order on hold while some aspect (e.g. tax-exempt documentation) needs to be manually confirmed. Orders with this status must be updated manually. Capturing funds or other order actions will not automatically update the status of an order marked Manual Verification Required.',
            'label' => 'label-plain',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'ff20d28a-90fc-472c-8219-5ba865c9880e',
            'name' => 'Partially Refunded',
            'description' => 'Seller has partially refunded the order.',
            'label' => 'label-warning',
            'status_type_id' => '6649fd59-0fc2-44e5-b735-032d72ee3b60',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Expense statuses
        DB::table('statuses')->insert([
            'id' => '04f83a7c-9c4e-47ff-8e26-41b3b83b03d0',
            'name' => 'Billable',
            'description' => 'Billable.',
            'label' => 'label-primary',
            'status_type_id' => '7805a9f3-c7ca-4a09-b021-cc9b253e2810',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'ce2c5387-337e-432c-9571-4ad97f702426',
            'name' => 'Non Billable',
            'description' => 'Non Billable.',
            'label' => 'label-success',
            'status_type_id' => '7805a9f3-c7ca-4a09-b021-cc9b253e2810',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // transaction
        DB::table('statuses')->insert([
            'id' => '2fb4fa58-f73d-40e6-ab80-f0d904393bf2',
            'name' => 'Paid',
            'description' => 'Paid.',
            'label' => 'label-success',
            'status_type_id' => '8f56fc70-6cd8-496f-9aec-89e5748968db',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('statuses')->insert([
            'id' => 'a40b5983-3c6b-4563-ab7c-20deefc1992b',
            'name' => 'Pending',
            'description' => 'Pending.',
            'label' => 'label-success',
            'status_type_id' => '8f56fc70-6cd8-496f-9aec-89e5748968db',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // campaign statuses
        DB::table('statuses')->insert([
            'id' => '30d10ccb-65c9-4872-8dce-06990d842962',
            'name' => 'Planning',
            'description' => 'Planning.',
            'label' => 'label-info',
            'status_type_id' => '4e730295-3dc3-44a4-bff8-149e66a51493',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('statuses')->insert([
            'id' => '2b734324-55a9-4731-b036-102a59b2ecb9',
            'name' => 'Active',
            'description' => 'Active.',
            'label' => 'label-primary',
            'status_type_id' => '4e730295-3dc3-44a4-bff8-149e66a51493',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('statuses')->insert([
            'id' => 'aa2efe40-1d5c-4f7a-bc65-76b56a1ac11a',
            'name' => 'Inactive',
            'description' => 'Inactive.',
            'label' => 'label-warning',
            'status_type_id' => '4e730295-3dc3-44a4-bff8-149e66a51493',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('statuses')->insert([
            'id' => '57f2e96e-3c02-4382-8623-67fe6e1de9a0',
            'name' => 'Complete',
            'description' => 'Complete.',
            'label' => 'label-success',
            'status_type_id' => '4e730295-3dc3-44a4-bff8-149e66a51493',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // lead statuses
        DB::table('statuses')->insert([
            'id' => 'fa346c7a-e8d9-4672-a22d-1e098d7f3f63',
            'name' => 'Attempted to contact',
            'description' => 'Attempted to contact.',
            'label' => 'label-success',
            'status_type_id' => '67dda04f-e6ab-4374-a969-76e29f500f52',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'f74f08a6-526c-46e5-aeeb-072b90bed515',
            'name' => 'Contact in future',
            'description' => 'Contact in future.',
            'label' => 'label-success',
            'status_type_id' => '67dda04f-e6ab-4374-a969-76e29f500f52',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '2c0d7cf1-13de-4af2-804e-7a10c36df5c3',
            'name' => 'Contacted',
            'description' => 'Contacted.',
            'label' => 'label-success',
            'status_type_id' => '67dda04f-e6ab-4374-a969-76e29f500f52',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '6d4ba04a-187e-423e-9292-abc2a545bab5',
            'name' => 'Junk Lead',
            'description' => 'Junk Lead.',
            'label' => 'label-success',
            'status_type_id' => '67dda04f-e6ab-4374-a969-76e29f500f52',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '9610da08-9087-40a6-93e2-00511bd7e754',
            'name' => 'Lost Lead',
            'description' => 'Lost Lead.',
            'label' => 'label-success',
            'status_type_id' => '67dda04f-e6ab-4374-a969-76e29f500f52',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '6e4c30ea-99eb-481f-970c-cc5878f8e0db',
            'name' => 'Not Contacted',
            'description' => 'Not Contacted.',
            'label' => 'label-success',
            'status_type_id' => '67dda04f-e6ab-4374-a969-76e29f500f52',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // deal
        DB::table('statuses')->insert([
            'id' => '9fffd4af-0789-404d-9739-88fb862b3a43',
            'name' => 'Prospecting',
            'description' => 'A very low probability deal. In the prospecting stage, a sales rep has spoken to a contact at the company and is just starting to establish a relationship, but hasn’t set up a formal appointment. At this stage, a new lead has likely just been passed from sales to marketing..',
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '06b40963-4c1e-493d-b06f-abb9ce77787c',
            'name' => 'Appointment Scheduled',
            'description' => 'Now a contact has “officially” agreed to a meeting with a member of the sales team. What that first appointment will look like will vary greatly depending on your business model, but it will typically be an in-person, video, or phone meeting during which a sales rep starts reviewing the prospect’s needs. The win probability, by default in HubSpot, moves up to 20 percent.',
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '2b220c6b-ff6c-443c-81f0-52bf05734bc3',
            'name' => 'Needs Analysis',
            'description' => 'Here, based on your needs analysis, your team has determined that your company and the prospect’s could have a great relationship together—which means that the prospect is now “qualified to buy.” This qualification bumps up his or her probability to 40 percent. At this point, reps typically start scheduling the next step: some form of more formalized demo or presentation.',
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'bb0fcaae-4452-4d6f-b651-a08c8f53d88f',
            'name' => 'Presentation Scheduled',
            'description' => 'Just as it sounds, at this point, your reps are preparing to talk to the client about your specific solution. Because their contact is more bought in, the probability is upgraded to 60 percent. You’ve now cleared the 50 percent hurdle!',
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'e50488f0-7ebe-4622-a5f0-9084c4672cfb',
            'name' => 'Decision-Maker Buy-In',
            'description' => 'Until this point, your team may or may not have been working with a decision-maker. While it’s great to build an internal coach to get you through the sales process, ultimately, the team needs to have buy-in from a decision-maker who can ask for—and sign—a contract. If after your presentation the decision-maker gives a verbal “yes” signal, the deal can move to an 80 percent probability.',
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '874c87eb-81dd-447e-8efe-85c560959977',
            'name' => 'Proposal/Price Quote',
            'description' => 'The proposal and price quote has been sent.',
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '0348b7f0-0fb5-44c1-b1d1-e38ea03f97c7',
            'name' => 'Negotiation/Review',
            'description' => "The quote has been sent but the price wasn't agreed on.",
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => 'dcf56b0a-99fa-4287-8d70-72bbb4843454',
            'name' => 'Contract Sent',
            'description' => 'After that verbal signal, it’s essential to send a formal proposal or contract with pricing and terms—this is the only way that sales can really close the deal. You should be sending a contract when you’re about 90 percent certain a deal will actually close.',
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '4e389bdf-c8fb-4d01-a6ba-0091231d5cc4',
            'name' => 'Closed Won',
            'description' => 'The CEO loves you, you send the contract, and it is signed: Congratulations—you can mark this deal “Closed Won” and start onboarding your new client.',
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'id' => '60397de4-6096-4efc-bb0b-e2216318b17e',
            'name' => 'Closed Lost',
            'description' => 'At any point during the process above, you can lose a deal. Maybe during your needs analysis, you find that your organization isn’t the right fit and refer the prospect elsewhere; perhaps the prospect doesn’t have enough budget left for the year. Whatever the reason, at this point, the deal should be marked “Closed Lost.”',
            'label' => 'label-success',
            'status_type_id' => 'cf5d25dc-dcf1-425c-9fdc-d580a7e0b334',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
