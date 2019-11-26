<?php

namespace App\Traits;

use App\Album;
use App\Design;
use App\Email;
use App\Journal;
use App\Order;
use App\Product;
use App\Project;
use App\ToDo;


trait StatusCountTrait
{

    public function emailsStatusCount()
    {
        // Get unread emails
        $unreadEmails = Email::where('status_id','9c267c79-162e-4ae1-9340-57a4c5ca5e81')->count();
        // Get seen emails
        $seenEmails = Email::where('status_id','f7c44dec-2fca-4807-a500-364430240167')->count();
        // Get read emails
        $readEmails = Email::where('status_id','33a90a31-d779-41ec-ae2b-11649119f496')->count();
        // Get replied emails
        $repliedEmails = Email::where('status_id','25743169-a5f2-4e71-878d-6c6ef02dfb08')->count();
        // Get flagged emails
        $flaggedEmails = Email::where('status_id','b911d833-c581-4e59-bfd0-72ea1becf544')->count();

        $statusCountArray = array(
            "unreadEmails"=>$unreadEmails,
            "seenEmails"=>$seenEmails,
            "readEmails"=>$readEmails,
            "repliedEmails"=>$repliedEmails,
            "flaggedEmails"=>$flaggedEmails
        );
        return $statusCountArray;
    }

    public function toDoStatusCount()
    {
        // Get pending to dos
        $pendingToDos = ToDo::where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->count();
        // Get inProgress to dos
        $inProgressToDos = ToDo::where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->count();
        // Get completed to dos
        $completedToDos = ToDo::where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->count();
        // Get overdue to dos
        $overdueToDos = ToDo::where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->count();

        $statusCountArray = array(
            "pendingToDos"=>$pendingToDos,
            "inProgressToDos"=>$inProgressToDos,
            "completedToDos"=>$completedToDos,
            "overdueToDos"=>$overdueToDos
        );
        return $statusCountArray;
    }

    public function clientProofsStatusCount()
    {
        // Get preview client proofs
        $previewClientProofs = Album::where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->where('status_id','cad5abf4-ed94-4184-8f7a-fe5084fb7d56')->count();
        // Get hidden client proofs
        $hiddenClientProofs = Album::where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->where('status_id','389842b7-a010-40c1-85cf-4f5b5144ccea')->count();
        // Get published client proofs
        $publishedClientProofs = Album::where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->count();

        $statusCountArray = array(
            "previewClientProofs"=>$previewClientProofs,
            "hiddenClientProofs"=>$hiddenClientProofs,
            "publishedClientProofs"=>$publishedClientProofs
        );
        return $statusCountArray;
    }

    public function personalAlbumsStatusCount()
    {
        // Get preview client proofs
        $previewPersonalAlbums = Album::where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->where('status_id','cad5abf4-ed94-4184-8f7a-fe5084fb7d56')->count();
        // Get hidden client proofs
        $hiddenPersonalAlbums = Album::where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->where('status_id','389842b7-a010-40c1-85cf-4f5b5144ccea')->count();
        // Get published client proofs
        $publishedPersonalAlbums = Album::where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->count();

        $statusCountArray = array(
            "previewPersonalAlbums"=>$previewPersonalAlbums,
            "hiddenPersonalAlbums"=>$hiddenPersonalAlbums,
            "publishedPersonalAlbums"=>$publishedPersonalAlbums
        );
        return $statusCountArray;
    }

    public function designsStatusCount()
    {
        // Get preview designs
        $previewDesigns = Design::where('status_id','cad5abf4-ed94-4184-8f7a-fe5084fb7d56')->count();
        // Get hidden designs
        $hiddenDesigns = Design::where('status_id','389842b7-a010-40c1-85cf-4f5b5144ccea')->count();
        // Get published designs
        $publishedDesigns = Design::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->count();

        $statusCountArray = array(
            "previewDesigns"=>$previewDesigns,
            "hiddenDesigns"=>$hiddenDesigns,
            "publishedDesigns"=>$publishedDesigns
        );
        return $statusCountArray;
    }

    public function projectsStatusCount()
    {

        // Get preview designs
        $previewProjects = Project::where('status_id','cad5abf4-ed94-4184-8f7a-fe5084fb7d56')->count();
        // Get hidden designs
        $hiddenProjects = Project::where('status_id','389842b7-a010-40c1-85cf-4f5b5144ccea')->count();
        // Get published designs
        $publishedProjects = Project::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->count();

        $statusCountArray = array(
            "previewProjects"=>$previewProjects,
            "hiddenProjects"=>$hiddenProjects,
            "publishedProjects"=>$publishedProjects
        );

        return $statusCountArray;

    }

    public function journalsStatusCount()
    {
        // Get preview journals
        $previewJournals = Journal::where('status_id','cad5abf4-ed94-4184-8f7a-fe5084fb7d56')->count();
        // Get hidden journals
        $hiddenJournals = Journal::where('status_id','389842b7-a010-40c1-85cf-4f5b5144ccea')->count();
        // Get published journals
        $publishedJournals = Journal::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->count();

        $statusCountArray = array(
            "previewJournals"=>$previewJournals,
            "hiddenJournals"=>$hiddenJournals,
            "publishedJournals"=>$publishedJournals
        );

        return $statusCountArray;

    }

    public function productsStatusCount()
    {

        // Get preview journals
        $previewProducts = Product::where('status_id','f1a32788-4016-4104-804b-92186b340eb0')->count();
        // Get unavailable journals
        $unavailableProducts = Product::where('status_id','2ae05f4d-318d-4475-a9b0-a648694eb5c2')->count();
        // Get back order journals
        $backOrderProducts = Product::where('status_id','6749f50e-1be5-412e-ac14-58b0ddba6be3')->count();
        // Get archived journals
        $archivedProducts = Product::where('status_id','597936fd-5f53-4b9f-8981-6f567ab992d5')->count();
        // Get discontinued journals
        $discontinuedProducts = Product::where('status_id','484c6218-e7c8-4e77-b548-82d45d8873b3')->count();
        // Get live journals
        $liveProducts = Product::where('status_id','e5d06435-7df5-45dd-a4e9-e57f538b8366')->count();

        $statusCountArray = array(
            "previewProducts"=>$previewProducts,
            "unavailableProducts"=>$unavailableProducts,
            "backOrderProducts"=>$backOrderProducts,
            "archivedProducts"=>$archivedProducts,
            "discontinuedProducts"=>$discontinuedProducts,
            "liveProducts"=>$liveProducts
        );

        return $statusCountArray;

    }

    public function ordersStatusCount()
    {

        return $productsCount;
    }

    public function salesStatusCount()
    {

        return $ordersCount;
    }


}
