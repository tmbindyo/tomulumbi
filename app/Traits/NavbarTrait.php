<?php

namespace App\Traits;

use App\Account;
use App\ActionType;
use App\Album;
use App\AlbumType;
use App\Asset;
use App\AssetAction;
use App\AssetCategory;
use App\Campaign;
use App\CampaignType;
use App\Category;
use App\Contact;
use App\ContactType;
use App\CookingSkill;
use App\CookingStyle;
use App\Course;
use App\Cuisine;
use App\Deal;
use App\Design;
use App\DietaryPreference;
use App\DishType;
use App\Email;
use App\Expense;
use App\ExpenseAccount;
use App\FoodType;
use App\Frequency;
use App\Invoice;
use App\Journal;
use App\Order;
use App\Product;
use App\Project;
use App\Sale;
use Auth;
use App\Loan;
use App\Institution;
use App\Kit;
use App\Label;
use App\LeadSource;
use App\Liability;
use App\MealType;
use App\Organization;
use App\OrganizationType;
use App\Payment;
use App\ProjectType;
use App\PromoCode;
use App\Quote;
use App\Refund;
use App\Size;
use App\SubType;
use App\Tag;
use App\Title;
use App\Transaction;
use App\Transfer;
use App\Tudeme;
use App\Type;
use App\Typography;

trait NavbarTrait
{

    public function getNavbarValues()
    {
        // Get unread emails
        $unreadEmails = Email::where('status_id','9c267c79-162e-4ae1-9340-57a4c5ca5e81')->get();
        // Get unread emails count
        $unreadEmailsCount = Email::where('status_id','9c267c79-162e-4ae1-9340-57a4c5ca5e81')->count();



        //settings
        // Get action types count
        $actionTypesCount = ActionType::count();
        // Get album types count
        $albumTypesCount = AlbumType::count();
        // Get asset categories count
        $assetCategoriesCount = AssetCategory::count();
        // Get categories count
        $categoriesCount = Category::count();
        // Get campaign types count
        $campaignTypesCount = CampaignType::count();
        // Get contact types count
        $contactTypesCount = ContactType::count();
        // Get expense accounts count
        $expenseAccountsCount = ExpenseAccount::count();
        // Get frequencies count
        $frequenciesCount = Frequency::count();
        // Get label count
        $labelsCount = Label::count();
        // Get lead source count
        $leadSourcseCount = LeadSource::count();
        // Get orgnization types count
        $organizationTypesCount = OrganizationType::count();
        // Get project types count
        $projectTypesCount = ProjectType::count();
        // Get sizes count
        $sizesCount = Size::count();
        // Get sub types count
        $subTypesCount = SubType::count();
        // Get tags count
        $tagsCount = Tag::count();
        // Get titles count
        $titlesCount = Title::count();
        // Get types count
        $typesCount = Type::count();
        // Get typographies count
        $typographiesCount = Typography::count();

        // Get cooking skill count
        $cookingSkillCount = CookingSkill::count();
        // Get cooking style count
        $cookingStyleCount = CookingStyle::count();
        // Get meal types count
        $mealTyleCount = MealType::count();
        // Get courses count
        $courseCount = Course::count();
        // Get dietary preference count
        $dietaryPreferenceCount = DietaryPreference::count();
        // Get dish type count
        $dishTypeCount = DishType::count();
        // Get food type count
        $foodTypeCount = FoodType::count();
        // Get cuisine count
        $cuisineCount = Cuisine::count();



        // CRM
        // Get campaigns count
        $campaignsCount = Campaign::count();
        // Get leads count
        $leadsCount = Contact::where('is_lead',True)->count();
        // Get contacts count
        $contacts = Contact::where('is_lead',False)->count();
        // Get organizations count
        $organizationsCount = Organization::count();
        // Get deals count
        $dealsCount = Deal::count();
        // Get quotes count
        $quotesCount = Quote::count();



        // work
        // Get personal albums  count
        $personalAlbumsCount = Album::where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->count();
        // Get client proofs count
        $clientProofsCount = Album::where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->count();
        // Get designs count
        $designsCount = Design::count();
        // Get projects count
        $projectsCount = Project::count();
        // Get fournal count
        $journalsCount = Journal::count();
        // Get tudeme count
        $tudemeCount = Tudeme::count();
        // Get letter count
        $letterCount = Journal::count();


        // store
        // Get orders count
        $ordersCount = Order::count();
        // Get products count
        $productsCount = Product::count();
        // Get promo codes count
        $promoCodesCount = PromoCode::count();


        // accounting
        // Get accounts count
        $accountsCount = Account::count();
        // Get expenses count
        $expensesCount = Expense::count();
        // Get liabilities count
        $liabilitiesCount = Liability::count();
        // Get loans count
        $loansCount = Loan::count();
        // Get payments count
        $paymentsCount = Payment::count();
        // Get refunds count
        $refundsCount = Refund::count();
        // Get transactions count
        $transactionsCount = Transaction::count();
        // Get transfers count
        $transfersCount = Transfer::count();


        // assets
        // Get assets count
        $assetsCount = Asset::count();
        // Get asset actions count
        $assetActionsCount = AssetAction::count();
        // Get kits count
        $kitsCount = Kit::count();

        $navbarValues = array("unreadEmails"=>$unreadEmails,
            "unreadEmailsCount"=>$unreadEmailsCount,

            "actionTypesCount"=>$actionTypesCount,
            "albumTypesCount"=>$albumTypesCount,
            "assetCategoriesCount"=>$assetCategoriesCount,
            "categoriesCount"=>$categoriesCount,
            "campaignTypesCount"=>$campaignTypesCount,
            "contactTypesCount"=>$contactTypesCount,
            "expenseAccountsCount"=>$expenseAccountsCount,
            "frequenciesCount"=>$frequenciesCount,
            "labelsCount"=>$labelsCount,
            "leadSourcseCount"=>$leadSourcseCount,
            "organizationTypesCount"=>$organizationTypesCount,
            "projectTypesCount"=>$projectTypesCount,
            "sizesCount"=>$sizesCount,
            "subTypesCount"=>$subTypesCount,
            "tagsCount"=>$tagsCount,
            "titlesCount"=>$titlesCount,
            "typesCount"=>$typesCount,
            "typographiesCount"=>$typographiesCount,
            "cookingSkillCount"=>$cookingSkillCount,
            "cookingStyleCount"=>$cookingStyleCount,
            "mealTyleCount"=>$mealTyleCount,
            "courseCount"=>$courseCount,
            "dietaryPreferenceCount"=>$dietaryPreferenceCount,
            "dishTypeCount"=>$dishTypeCount,
            "foodTypeCount"=>$foodTypeCount,
            "cuisineCount"=>$cuisineCount,

            "campaignsCount"=>$campaignsCount,
            "leadsCount"=>$leadsCount,
            "contacts"=>$contacts,
            "organizationsCount"=>$organizationsCount,
            "dealsCount"=>$dealsCount,
            "quotesCount"=>$quotesCount,

            "clientProofsCount"=>$clientProofsCount,
            "personalAlbumsCount"=>$personalAlbumsCount,
            "designsCount"=>$designsCount,
            "projectsCount"=>$projectsCount,
            "journalsCount"=>$journalsCount,
            "tudemeCount"=>$tudemeCount,
            "letterCount"=>$letterCount,

            "ordersCount"=>$ordersCount,
            "productsCount"=>$productsCount,
            "promoCodesCount"=>$promoCodesCount,

            "accountsCount"=>$accountsCount,
            "expensesCount"=>$expensesCount,
            "liabilitiesCount"=>$liabilitiesCount,
            "loansCount"=>$loansCount,
            "paymentsCount"=>$paymentsCount,
            "refundsCount"=>$refundsCount,
            "transactionsCount"=>$transactionsCount,
            "transfersCount"=>$transfersCount,

            "assetsCount"=>$assetsCount,
            "assetActionsCount"=>$assetActionsCount,
            "kitsCount"=>$kitsCount
        );

        return $navbarValues;
    }


}
