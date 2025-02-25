<?php

namespace App\Http\Livewire\Admin\Valuation\Valuationprocess;

use App\Models\Admin\Settings\Mastersetting\Engineer;
use App\Models\Admin\Valuation\Valuation;
use App\Models\Admin\Valuation\Valuationprocess\Wizard1\Ownerlist;
use App\Models\Admin\Valuation\Valuationprocess\Wizard1\Propertyownerlist;
use App\Models\Admin\Valuation\Valuationprocess\Wizard3\Dwellingarealist;
use App\Models\Admin\Valuation\Valuationprocess\Wizard3\Plintharealist;
use App\Models\Admin\Valuation\Valuationprocess\Wizard3\Salesdeeednamelist;
use App\Models\Admin\Valuation\Wizardfive;
use App\Models\Admin\Valuation\Wizardfour;
use App\Models\Admin\Valuation\Wizardone;
use App\Models\Admin\Valuation\Wizardsix;
use App\Models\Admin\Valuation\Wizardthree;
use App\Models\Admin\Valuation\Wizardtwo;
use App\Models\Miscellaneous\Helper;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Valuationprocesslivewire extends Component
{
    use WithFileUploads, UploadTrait;
    public $valuation_id;
    public $currentStep = 1;
    public $name, $price, $detail, $status = 1;
    //Wizard 1
    public $fileno, $filedate, $engineer_id, $valueraddress, $purposeofvaluation, $dateofinspection, $titledeednumberdate, $dateonvaluation, $propertydesccription;
    public $plotorsurveyno, $doorno, $tsnoorvillage, $wardortaluka, $mandalordistrict, $validityoflayout, $dateofissue, $approvedmaporplanissuingauthority;
    public $approvedmapdate, $plan_is_verified = false, $othercomments, $addressofproperty, $cityortown, $residentialarea, $commercialarea, $industrialarea;
    public $classificationofarea, $classificationofarea1, $propertycomesunder, $coveredunder, $boundaryofpropertynorth, $boundaryofpropertysouth;
    public $boundaryofpropertyeast, $boundaryofpropertywest, $dimensionofsiteasperdeednorth, $dimensionofsiteasexistingnorth, $dimensionofsiteasperdeedsouth, $dimensionofsiteasexistingsouth;
    public $dimensionofsiteasperdeedeast, $dimensionofsiteasexistingeast, $dimensionofsiteasperdeedwest, $dimensionofsiteasexistingwest;
    public $longitude, $latitude, $what3words, $googlemaplocation, $extentofsite, $occupiedby, $document1, $document2, $document3, $document4;
    //Wizard 2
    public $nameofapartment, $descriptionoflocality, $yearofconstruction, $nooffloors, $typeofstructure, $noofunits, $qualityofconstruction, $appearanceofconstruction;
    public $maintenanceofbuilding, $is_lift = false, $is_watersupply = false, $is_compoundwall = false, $is_pavement = false, $is_carparking = false, $is_underwater = false;
    //Wizard 3
    public $flatfloor, $doornoofflat, $roof, $flooring, $doors, $windows, $fittings, $finishing, $assessmentno, $taxpaidname, $taxamount, $electricityserviceconnectionno;
    public $metercardname, $maintenanceofflat, $builtuparea, $plinthareaofflat, $floorspaceindex, $carpetareaofflat, $areaoflocality, $usagepurpose, $owneroccupiedorletout;
    public $monthlyrent, $setbacksasperplannorth, $setbacksasperplansouth, $setbacksasperplaneast, $setbacksasperplanwest, $setbacksaspersitenorth, $setbacksaspersitesouth, $setbacksaspersiteeast, $setbacksaspersitewest;
    public $plinthareaasperplannorth, $plinthareaasperplansouth, $plinthareaasperplaneast, $plinthareaasperplanwest, $plinthareaaspersitenorth, $plinthareaaspersitesouth, $plinthareaaspersiteeast, $plinthareaaspersitewest;
    public $dwellingareaasperplannorth, $dwellingareaasperplansouth, $dwellingareaasperplaneast, $dwellingareaasperplanwest, $dwellingareaaspersitenorth, $dwellingareaaspersitesouth, $dwellingareaaspersiteeast, $dwellingareaaspersitewest;
    //Wizard 4
    public $marketability, $extrapotentialvalue, $negativefactors, $compositerate, $adoptedcompositeratemin, $adoptedcompositeratemax, $adoptedbasiccompositerate, $buildingandservices, $landandothers, $registrarrate;
    public $ageofbuilding, $lifeofbuilding, $salvagevalue, $depreciatedratio;
    public $totalcompositerate, $depreciatedbuildingrate, $say;
    public $currentmarketrate, $servicelifebuilding, $depreciationaccounted, $depreciatedrateconstruction;
    public $pwdrate, $pwdservicelifebuilding, $pwddepreciationaccounted, $pwddepreciatedrateconstruction;

    //Wizard 5
    public $buildingplusserviceqty, $buildingplusservicerate;
    public $coveredcarparkqty, $coveredcarparkrate, $coveredcarparkguide;
    public $liftqty, $liftrate, $liftguide;
    public $modularkitchenqty, $modularkitchenrate, $modularkitchenguide;
    public $superfinefinishqty, $superfinefinishrate, $superfinefinishguide;
    public $interiordecorationqty, $interiordecorationrate, $interiordecorationguide;
    public $electricaldepositfittingqty, $electricaldepositfittingrate, $electricaldepositfittingguide;
    public $extracollapsiblegateqty, $extracollapsiblegaterate, $extracollapsiblegateguide;
    public $potentialvalueqty, $potentialvaluerate, $potentialvalueguide;
    public $dateofpurchase, $purchaseprice;

    //Wizard 6
    public $screenshot1, $screenshot2, $screenshot3, $screenshot4, $existingscreenshot1, $existingscreenshot2, $existingscreenshot3, $existingscreenshot4;
    public $governmentnotification1, $governmentnotification2, $existinggovernmentnotification1, $existinggovernmentnotification2;
    public $mapscreenshot, $existingmapscreenshot;
    public $propertyphoto1, $propertyphoto2, $propertyphoto3, $propertyphoto4, $propertyphoto5, $propertyphoto6, $propertyphoto7, $propertyphoto8, $propertyphoto9, $propertyphoto10, $propertyphoto11, $propertyphoto12;
    public $existingpropertyphoto1, $existingpropertyphoto2, $existingpropertyphoto3, $existingpropertyphoto4, $existingpropertyphoto5, $existingpropertyphoto6;
    public $existingpropertyphoto7, $existingpropertyphoto8, $existingpropertyphoto9, $existingpropertyphoto10, $existingpropertyphoto11, $existingpropertyphoto12;

    public $owner_list = [], $propertyownerlist = [], $salesdeeednamelist = [], $engineerlist = [], $plintharealist = [], $dwellingarealist = [];
    public $validatedwizard1, $validatedwizard2, $validatedwizard3, $validatedwizard4, $validatedwizard5, $validatedwizard6;
    public $wizardoneid, $wizardtwoid, $wizardthreeid, $wizardfourid, $wizardfiveid, $wizardsixid, $valuation;
    public $ownerdeletebutton = 0, $propertyownerdeletebutton = 0, $salesdeeedbutton = 0, $dwellingareabutton = 0, $plinthareabutton = 0;

    public $delete_array = [];

    public function mount($valuation_id)
    {
        $this->engineerlist = Engineer::where('active', true)->get();
        $this->valuation_id = $valuation_id;
        $this->valuation = Valuation::find($valuation_id);
        $wizardone = Wizardone::where('valuation_id', $valuation_id)->first();
        $wizardtwo = Wizardtwo::where('valuation_id', $valuation_id)->first();
        $wizardthree = Wizardthree::where('valuation_id', $valuation_id)->first();
        $wizardfour = Wizardfour::where('valuation_id', $valuation_id)->first();
        $wizardfive = Wizardfive::where('valuation_id', $valuation_id)->first();
        $wizardsix = Wizardsix::where('valuation_id', $valuation_id)->first();
        if ($wizardone) {
            $this->wizardoneid = $wizardone->id;
            $this->engineer_id = $wizardone->engineer_id;
            $this->valueraddress = $wizardone->engineer->address;
            $this->fileno = $wizardone->fileno;
            $this->filedate = $wizardone->filedate;
            $this->purposeofvaluation = $wizardone->purposeofvaluation;
            $this->dateofinspection = $wizardone->dateofinspection;
            $this->titledeednumberdate = $wizardone->titledeednumberdate;
            $this->dateonvaluation = $wizardone->dateonvaluation;
            $this->propertydesccription = $wizardone->propertydesccription;
            $this->plotorsurveyno = $wizardone->plotorsurveyno;
            $this->doorno = $wizardone->doorno;
            $this->tsnoorvillage = $wizardone->tsnoorvillage;
            $this->wardortaluka = $wizardone->wardortaluka;
            $this->mandalordistrict = $wizardone->mandalordistrict;
            $this->validityoflayout = $wizardone->validityoflayout;
            $this->dateofissue = $wizardone->dateofissue;
            $this->approvedmaporplanissuingauthority = $wizardone->approvedmaporplanissuingauthority;
            $this->approvedmapdate = $wizardone->approvedmapdate;
            $this->plan_is_verified = $wizardone->plan_is_verified;
            $this->othercomments = $wizardone->othercomments;
            $this->addressofproperty = $wizardone->addressofproperty;
            $this->cityortown = $wizardone->cityortown;
            $this->residentialarea = $wizardone->residentialarea;
            $this->commercialarea = $wizardone->commercialarea;
            $this->industrialarea = $wizardone->industrialarea;
            $this->classificationofarea = $wizardone->classificationofarea;
            $this->classificationofarea1 = $wizardone->classificationofarea1;
            $this->propertycomesunder = $wizardone->propertycomesunder;
            $this->coveredunder = $wizardone->coveredunder;
            $this->boundaryofpropertynorth = $wizardone->boundaryofpropertynorth;
            $this->boundaryofpropertysouth = $wizardone->boundaryofpropertysouth;
            $this->boundaryofpropertyeast = $wizardone->boundaryofpropertyeast;
            $this->boundaryofpropertywest = $wizardone->boundaryofpropertywest;
            $this->dimensionofsiteasperdeednorth = $wizardone->dimensionofsiteasperdeednorth;
            $this->dimensionofsiteasexistingnorth = $wizardone->dimensionofsiteasexistingnorth;
            $this->dimensionofsiteasperdeedsouth = $wizardone->dimensionofsiteasperdeedsouth;
            $this->dimensionofsiteasexistingsouth = $wizardone->dimensionofsiteasexistingsouth;
            $this->dimensionofsiteasperdeedeast = $wizardone->dimensionofsiteasperdeedeast;
            $this->dimensionofsiteasexistingeast = $wizardone->dimensionofsiteasexistingeast;
            $this->dimensionofsiteasperdeedwest = $wizardone->dimensionofsiteasperdeedwest;
            $this->dimensionofsiteasexistingwest = $wizardone->dimensionofsiteasexistingwest;
            $this->longitude = $wizardone->longitude;
            $this->latitude = $wizardone->latitude;
            $this->what3words = $wizardone->what3words;
            $this->googlemaplocation = $wizardone->googlemaplocation;
            $this->extentofsite = $wizardone->extentofsite;
            $this->occupiedby = $wizardone->occupiedby;
            $this->document1 = $wizardone->document1;
            $this->document2 = $wizardone->document2;
            $this->document3 = $wizardone->document3;
            $this->document4 = $wizardone->document4;
            if ($wizardone->ownerlist) {
                $this->ownerdeletebutton = $wizardone->ownerlist->count();
                foreach ($wizardone->ownerlist as $key => $eachownerlist) {
                    $this->owner_list[$key]['ownerlist_id'] = $eachownerlist->id;
                    $this->owner_list[$key]['name'] = $eachownerlist->name;
                    $this->owner_list[$key]['sdof'] = $eachownerlist->sdof;
                    $this->owner_list[$key]['address'] = $eachownerlist->address;
                    $this->owner_list[$key]['phone'] = $eachownerlist->phone;
                }
            }
            if ($wizardone->propertyownerlist) {
                $this->propertyownerdeletebutton = $wizardone->propertyownerlist->count();
                foreach ($wizardone->propertyownerlist as $key => $eachpropertyownerlist) {
                    $this->propertyownerlist[$key]['propertyownerlist_id'] = $eachpropertyownerlist->id;
                    $this->propertyownerlist[$key]['name'] = $eachpropertyownerlist->name;
                    $this->propertyownerlist[$key]['sdof'] = $eachpropertyownerlist->sdof;
                }
            }
        }
        if ($wizardtwo) {
            $this->wizardtwoid = $wizardtwo->id;
            $this->nameofapartment = $wizardtwo->nameofapartment;
            $this->descriptionoflocality = $wizardtwo->descriptionoflocality;
            $this->yearofconstruction = $wizardtwo->yearofconstruction;
            $this->nooffloors = $wizardtwo->nooffloors;
            $this->typeofstructure = $wizardtwo->typeofstructure;
            $this->noofunits = $wizardtwo->noofunits;
            $this->qualityofconstruction = $wizardtwo->qualityofconstruction;
            $this->appearanceofconstruction = $wizardtwo->appearanceofconstruction;
            $this->maintenanceofbuilding = $wizardtwo->maintenanceofbuilding;
            $this->is_lift = $wizardtwo->is_lift;
            $this->is_watersupply = $wizardtwo->is_watersupply;
            $this->is_compoundwall = $wizardtwo->is_compoundwall;
            $this->is_pavement = $wizardtwo->is_pavement;
            $this->is_carparking = $wizardtwo->is_carparking;
            $this->is_underwater = $wizardtwo->is_underwater;
        }
        if ($wizardthree) {
            $this->wizardthreeid = $wizardthree->id;
            $this->flatfloor = $wizardthree->flatfloor;
            $this->doornoofflat = $wizardthree->doornoofflat;
            $this->roof = $wizardthree->roof;
            $this->flooring = $wizardthree->flooring;
            $this->doors = $wizardthree->doors;
            $this->windows = $wizardthree->windows;
            $this->fittings = $wizardthree->fittings;
            $this->finishing = $wizardthree->finishing;
            $this->assessmentno = $wizardthree->assessmentno;
            $this->taxpaidname = $wizardthree->taxpaidname;
            $this->taxamount = $wizardthree->taxamount;
            $this->electricityserviceconnectionno = $wizardthree->electricityserviceconnectionno;
            $this->metercardname = $wizardthree->metercardname;
            $this->maintenanceofflat = $wizardthree->maintenanceofflat;
            $this->builtuparea = $wizardthree->builtuparea;
            $this->plinthareaofflat = $wizardthree->plinthareaofflat;
            $this->floorspaceindex = $wizardthree->floorspaceindex;
            $this->carpetareaofflat = $wizardthree->carpetareaofflat;
            $this->areaoflocality = $wizardthree->areaoflocality;
            $this->usagepurpose = $wizardthree->usagepurpose;
            $this->owneroccupiedorletout = $wizardthree->owneroccupiedorletout;
            $this->monthlyrent = $wizardthree->monthlyrent;
            $this->setbacksasperplannorth = $wizardthree->setbacksasperplannorth;
            $this->setbacksasperplansouth = $wizardthree->setbacksasperplansouth;
            $this->setbacksasperplaneast = $wizardthree->setbacksasperplaneast;
            $this->setbacksasperplanwest = $wizardthree->setbacksasperplanwest;
            $this->setbacksaspersitenorth = $wizardthree->setbacksaspersitenorth;
            $this->setbacksaspersitesouth = $wizardthree->setbacksaspersitesouth;
            $this->setbacksaspersiteeast = $wizardthree->setbacksaspersiteeast;
            $this->setbacksaspersitewest = $wizardthree->setbacksaspersitewest;
            $this->plinthareaasperplannorth = $wizardthree->plinthareaasperplannorth;
            $this->plinthareaasperplansouth = $wizardthree->plinthareaasperplansouth;
            $this->plinthareaasperplaneast = $wizardthree->plinthareaasperplaneast;
            $this->plinthareaasperplanwest = $wizardthree->plinthareaasperplanwest;
            $this->plinthareaaspersitenorth = $wizardthree->plinthareaaspersitenorth;
            $this->plinthareaaspersitesouth = $wizardthree->plinthareaaspersitesouth;
            $this->plinthareaaspersiteeast = $wizardthree->plinthareaaspersiteeast;
            $this->plinthareaaspersitewest = $wizardthree->plinthareaaspersitewest;
            $this->dwellingareaasperplannorth = $wizardthree->dwellingareaasperplannorth;
            $this->dwellingareaasperplansouth = $wizardthree->dwellingareaasperplansouth;
            $this->dwellingareaasperplaneast = $wizardthree->dwellingareaasperplaneast;
            $this->dwellingareaasperplanwest = $wizardthree->dwellingareaasperplanwest;
            $this->dwellingareaaspersitenorth = $wizardthree->dwellingareaaspersitenorth;
            $this->dwellingareaaspersitesouth = $wizardthree->dwellingareaaspersitesouth;
            $this->dwellingareaaspersiteeast = $wizardthree->dwellingareaaspersiteeast;
            $this->dwellingareaaspersitewest = $wizardthree->dwellingareaaspersitewest;
            if ($wizardthree->salesdeeednamelist) {
                $this->propertyownerdeletebutton = $wizardthree->salesdeeednamelist->count();
                foreach ($wizardthree->salesdeeednamelist as $key => $eachsalesdeeednamelist) {
                    $this->salesdeeednamelist[$key]['salesdeeednamelist_id'] = $eachsalesdeeednamelist->id;
                    $this->salesdeeednamelist[$key]['name'] = $eachsalesdeeednamelist->name;
                    $this->salesdeeednamelist[$key]['sdof'] = $eachsalesdeeednamelist->sdof;
                }
            }
            if ($wizardthree->plintharealist) {
                $this->propertyownerdeletebutton = $wizardthree->plintharealist->count();
                foreach ($wizardthree->plintharealist as $key => $eachplintharealist) {
                    $this->plintharealist[$key]['plintharealist_id'] = $eachplintharealist->id;
                    $this->plintharealist[$key]['name'] = $eachplintharealist->name;
                    $this->plintharealist[$key]['asperplan'] = $eachplintharealist->asperplan;
                    $this->plintharealist[$key]['aspersite'] = $eachplintharealist->aspersite;
                }
            }
            if ($wizardthree->dwellingarealist) {
                $this->propertyownerdeletebutton = $wizardthree->dwellingarealist->count();
                foreach ($wizardthree->dwellingarealist as $key => $eachdwellingarealist) {
                    $this->dwellingarealist[$key]['dwellingarealist_id'] = $eachdwellingarealist->id;
                    $this->dwellingarealist[$key]['name'] = $eachdwellingarealist->name;
                    $this->dwellingarealist[$key]['asperplan'] = $eachdwellingarealist->asperplan;
                    $this->dwellingarealist[$key]['aspersite'] = $eachdwellingarealist->aspersite;
                }
            }
        }
        if ($wizardfour) {
            $this->wizardfourid = $wizardfour->id;
            $this->marketability = $wizardfour->marketability;
            $this->extrapotentialvalue = $wizardfour->extrapotentialvalue;
            $this->negativefactors = $wizardfour->negativefactors;
            $this->compositerate = $wizardfour->compositerate;
            $this->adoptedcompositeratemin = $wizardfour->adoptedcompositeratemin;
            $this->adoptedcompositeratemax = $wizardfour->adoptedcompositeratemax;
            $this->adoptedbasiccompositerate = $wizardfour->adoptedbasiccompositerate;
            $this->buildingandservices = $wizardfour->buildingandservices;
            $this->landandothers = $wizardfour->landandothers;
            $this->registrarrate = $wizardfour->registrarrate;
            $this->ageofbuilding = $wizardfour->ageofbuilding;
            $this->lifeofbuilding = $wizardfour->lifeofbuilding;
            $this->salvagevalue = $wizardfour->salvagevalue;
            $this->depreciatedratio = $wizardfour->depreciatedratio;
            $this->totalcompositerate = $wizardfour->totalcompositerate;
            $this->currentmarketrate = $wizardfour->currentmarketrate;
            $this->servicelifebuilding = $wizardfour->servicelifebuilding;
            $this->depreciationaccounted = $wizardfour->depreciationaccounted;
            $this->depreciatedrateconstruction = $wizardfour->depreciatedrateconstruction;
            $this->depreciatedbuildingrate = $wizardfour->depreciatedbuildingrate;
            $this->say = $wizardfour->say;
            $this->pwdrate = $wizardfour->pwdrate;
            $this->pwdservicelifebuilding = $wizardfour->pwdservicelifebuilding;
            $this->pwddepreciationaccounted = $wizardfour->pwddepreciationaccounted;
            $this->pwddepreciatedrateconstruction = $wizardfour->pwddepreciatedrateconstruction;
        }
        if ($wizardfive) {
            $this->wizardfiveid = $wizardfive->id;
            $this->buildingplusserviceqty = $wizardfive->buildingplusserviceqty;
            $this->buildingplusservicerate = $wizardfive->buildingplusservicerate;
            $this->coveredcarparkqty = $wizardfive->coveredcarparkqty;
            $this->coveredcarparkrate = $wizardfive->coveredcarparkrate;
            $this->coveredcarparkguide = $wizardfive->coveredcarparkguide;
            $this->liftqty = $wizardfive->liftqty;
            $this->liftrate = $wizardfive->liftrate;
            $this->liftguide = $wizardfive->liftguide;
            $this->modularkitchenqty = $wizardfive->modularkitchenqty;
            $this->modularkitchenrate = $wizardfive->modularkitchenrate;
            $this->modularkitchenguide = $wizardfive->modularkitchenguide;
            $this->superfinefinishqty = $wizardfive->superfinefinishqty;
            $this->superfinefinishrate = $wizardfive->superfinefinishrate;
            $this->superfinefinishguide = $wizardfive->superfinefinishguide;
            $this->interiordecorationqty = $wizardfive->interiordecorationqty;
            $this->interiordecorationrate = $wizardfive->interiordecorationrate;
            $this->interiordecorationguide = $wizardfive->interiordecorationguide;
            $this->electricaldepositfittingqty = $wizardfive->electricaldepositfittingqty;
            $this->electricaldepositfittingrate = $wizardfive->electricaldepositfittingrate;
            $this->electricaldepositfittingguide = $wizardfive->electricaldepositfittingguide;
            $this->extracollapsiblegateqty = $wizardfive->extracollapsiblegateqty;
            $this->extracollapsiblegaterate = $wizardfive->extracollapsiblegaterate;
            $this->extracollapsiblegateguide = $wizardfive->extracollapsiblegateguide;
            $this->potentialvalueqty = $wizardfive->potentialvalueqty;
            $this->potentialvaluerate = $wizardfive->potentialvaluerate;
            $this->potentialvalueguide = $wizardfive->potentialvalueguide;
        }
        if ($wizardsix) {
            $this->wizardsixid = $wizardsix->id;
            $this->screenshot1 = null;
            $this->existingscreenshot1 = $wizardsix->screenshot1;
            $this->screenshot2 = null;
            $this->existingscreenshot2 = $wizardsix->screenshot2;
            $this->screenshot3 = null;
            $this->existingscreenshot3 = $wizardsix->screenshot3;
            $this->screenshot4 = null;
            $this->existingscreenshot4 = $wizardsix->screenshot4;
            $this->governmentnotification1 = null;
            $this->existinggovernmentnotification1 = $wizardsix->governmentnotification1;
            $this->governmentnotification2 = null;
            $this->existinggovernmentnotification2 = $wizardsix->governmentnotification2;
            $this->mapscreenshot = null;
            $this->existingmapscreenshot = $wizardsix->mapscreenshot;
            $this->propertyphoto1 = null;
            $this->existingpropertyphoto1 = $wizardsix->propertyphoto1;
            $this->propertyphoto2 = null;
            $this->existingpropertyphoto2 = $wizardsix->propertyphoto2;
            $this->propertyphoto3 = null;
            $this->existingpropertyphoto3 = $wizardsix->propertyphoto3;
            $this->propertyphoto4 = null;
            $this->existingpropertyphoto4 = $wizardsix->propertyphoto4;
            $this->propertyphoto5 = null;
            $this->existingpropertyphoto5 = $wizardsix->propertyphoto5;
            $this->propertyphoto6 = null;
            $this->existingpropertyphoto6 = $wizardsix->propertyphoto6;
            $this->propertyphoto7 = null;
            $this->existingpropertyphoto7 = $wizardsix->propertyphoto7;
            $this->propertyphoto8 = null;
            $this->existingpropertyphoto8 = $wizardsix->propertyphoto8;
            $this->propertyphoto9 = null;
            $this->existingpropertyphoto9 = $wizardsix->propertyphoto9;
            $this->propertyphoto10 = null;
            $this->existingpropertyphoto10 = $wizardsix->propertyphoto10;
            $this->propertyphoto11 = null;
            $this->existingpropertyphoto11 = $wizardsix->propertyphoto11;
            $this->propertyphoto12 = null;
            $this->existingpropertyphoto12 = $wizardsix->propertyphoto12;
        }
    }
    public function updatedEngineerid()
    {
        if ($this->engineer_id && is_numeric($this->engineer_id)) {
            $this->valueraddress = Engineer::find($this->engineer_id)->address;
        } else {
            $this->valueraddress = '';
        }
    }
    public function addowner()
    {
        $this->owner_list[] = [
            'ownerlist_id' => null,
            'name' => null,
            'sordof' => null,
            'address' => null,
            'phone' => null,
        ];
    }
    public function removeowner($key)
    {
        unset($this->owner_list[$key]);
    }
    public function addpropertyowner()
    {
        $this->propertyownerlist[] = [
            'propertyownerlist_id' => null,
            'name' => null,
            'sordof' => null,
        ];
    }
    public function removepropertyowner($key)
    {
        unset($this->propertyownerlist[$key]);
    }
    public function addsalesdeednames()
    {
        $this->salesdeeednamelist[] = [
            'salesdeeednamelist_id' => null,
            'name' => null,
            'sordof' => null,
        ];
    }
    public function removesalesdeedname($key)
    {
        unset($this->salesdeeednamelist[$key]);
    }
    public function addplintharea()
    {
        $this->plintharealist[] = [
            'plintharealist_id' => null,
            'name' => null,
            'asperplan' => null,
            'aspersite' => null,
        ];
    }
    public function removeplintharea($key)
    {
        unset($this->plintharealist[$key]);
    }
    public function adddwellingarea()
    {
        $this->dwellingarealist[] = [
            'dwellingarealist_id' => null,
            'name' => null,
            'asperplan' => null,
            'aspersite' => null,
        ];
    }
    public function removedwellingarea($key)
    {
        unset($this->dwellingarealist[$key]);
    }
    public function firstStepSubmit()
    {
        try {
            DB::beginTransaction();
            $this->validatedwizard1 = $this->validate(
                [
                    'fileno' => 'required|min:3|max:70',
                    'filedate' => 'required',
                    'purposeofvaluation' => 'nullable|min:5|max:255',
                    'dateofinspection' => 'required',
                    'engineer_id' => 'required',
                    'titledeednumberdate' => 'nullable|min:3|max:90',
                    'dateonvaluation' => 'nullable',
                    'document1' => 'nullable',
                    'document2' => 'nullable',
                    'document3' => 'nullable',
                    'document4' => 'nullable',
                    'propertydesccription' => 'nullable',
                    'plotorsurveyno' => 'nullable',
                    'doorno' => 'nullable',
                    'tsnoorvillage' => 'nullable',
                    'wardortaluka' => 'nullable',
                    'mandalordistrict' => 'nullable',
                    'validityoflayout' => 'nullable',
                    'dateofissue' => 'nullable',
                    'approvedmaporplanissuingauthority' => 'nullable',
                    'approvedmapdate' => 'nullable',
                    'plan_is_verified' => 'nullable',
                    'othercomments' => 'nullable',
                    'addressofproperty' => 'required|min:5|max:250',
                    'cityortown' => 'nullable',
                    'residentialarea' => 'nullable',
                    'commercialarea' => 'nullable',
                    'industrialarea' => 'nullable',
                    'classificationofarea' => 'nullable',
                    'classificationofarea1' => 'nullable',
                    'propertycomesunder' => 'nullable',
                    'coveredunder' => 'nullable',
                    'boundaryofpropertynorth' => 'nullable',
                    'boundaryofpropertysouth' => 'nullable',
                    'boundaryofpropertyeast' => 'nullable',
                    'boundaryofpropertywest' => 'nullable',
                    'dimensionofsiteasperdeednorth' => 'nullable',
                    'dimensionofsiteasexistingnorth' => 'nullable',
                    'dimensionofsiteasperdeedsouth' => 'nullable',
                    'dimensionofsiteasexistingsouth' => 'nullable',
                    'dimensionofsiteasperdeedeast' => 'nullable',
                    'dimensionofsiteasexistingeast' => 'nullable',
                    'dimensionofsiteasperdeedwest' => 'nullable',
                    'dimensionofsiteasexistingwest' => 'nullable',
                    'extentofsite' => 'required|numeric',
                    'latitude' => 'nullable',
                    'longitude' => 'nullable',
                    'what3words' => 'nullable',
                    'googlemaplocation' => 'nullable',
                    'occupiedby' => 'nullable',
                    'owner_list.*.ownerlist_id' => 'nullable',
                    'owner_list.*.name' => 'required',
                    'owner_list.*.sdof' => 'required',
                    'owner_list.*.address' => 'required|min:5|max:250',
                    'owner_list.*.phone' => 'nullable|numeric|digits:10',
                    'propertyownerlist.*.propertyownerlist_id' => 'nullable',
                    'propertyownerlist.*.name' => 'required',
                    'propertyownerlist.*.sdof' => 'required',
                ],
                [
                    'engineer_id.required' => 'Select the Engineer',
                    'addressofproperty.required' => 'Enter the Addres',
                    'extentofsite.required' => 'Enter the Extent of the Site',
                    'nameofvaluer.required' => 'Name of Valuer cannot be empty',
                    'name.min' => 'Name should have minimum 3 letters',
                    'name.max' => 'Name should not exceed 35 letters',
                    'addressofvaluer.required' => 'Address of Valuer Required',
                    'purposeofvaluation.min' => 'Purpose of Valuation must be at least 5 characters',
                    'purposeofvaluation.max' => 'Purpose of Valuation must be maximum 70 characters',
                    'dateofinspection.required' => 'Select the date of Inspection',
                    'owner_list.*.name.required' => 'Enter Owner Name',
                    'owner_list.*.sdof.required' => 'Enter S/DOF Name',
                    'owner_list.*.address.required' => 'Enter Owner Address',
                    'owner_list.*.phone.digits' => 'Invalid Phone Number',
                    'propertyownerlist.*.name.required' => 'Enter Name',
                    'propertyownerlist.*.sdof.required' => 'Enter S/DOF Name',
                ]);
            $this->validatedwizard1['valuation_id'] = $this->valuation_id;
            if ($this->wizardoneid) {
                $wizardone = Wizardone::find($this->wizardoneid)->first();
                $wizardone->update($this->validatedwizard1);
            } else {
                $wizardone = Wizardone::create($this->validatedwizard1);
                $this->wizardoneid = $wizardone->id;
            }
            if (!empty($this->owner_list)) {
                $this->ownerlistcreate($wizardone);
            }
            if (!empty($this->propertyownerlist)) {
                $this->propertyownerlistcreate($wizardone);
            }
            DB::commit();
            $this->currentStep = 2;
        } catch (Exception $e) {
            $this->exceptionerror('createorupdate', 'one', $e);
        } catch (QueryException $e) {
            $this->exceptionerror('createorupdate', 'two', $e);
        } catch (PDOException $e) {
            $this->exceptionerror('createorupdate', 'three', $e);
        }

    }
    public function secondStepSubmit()
    {
        try {
            DB::beginTransaction();
            $this->validatedwizard2 = $this->validate(
                [
                    'nameofapartment' => 'required',
                    'descriptionoflocality' => 'nullable|numeric',
                    'yearofconstruction' => 'nullable|numeric',
                    'nooffloors' => 'nullable',
                    'typeofstructure' => 'nullable',
                    'noofunits' => 'nullable',
                    'qualityofconstruction' => 'nullable|numeric',
                    'appearanceofconstruction' => 'nullable|numeric',
                    'maintenanceofbuilding' => 'nullable|numeric',
                    'is_lift' => 'nullable',
                    'is_watersupply' => 'nullable',
                    'is_compoundwall' => 'nullable',
                    'is_pavement' => 'nullable',
                    'is_carparking' => 'nullable',
                    'is_underwater' => 'nullable',
                ], [
                    'nameofapartment.required' => 'Enter the name of the Apartment',
                ]
            );
            $this->validatedwizard2['valuation_id'] = $this->valuation_id;
            if ($this->wizardtwoid) {
                $wizardtwoupdate = Wizardtwo::find($this->wizardtwoid)->first();
                $wizardtwoupdate->update($this->validatedwizard2);
            } else {
                $this->wizardtwoid = Wizardtwo::create($this->validatedwizard2)->id;
            }
            DB::commit();
            $this->currentStep = 3;
        } catch (Exception $e) {
            $this->exceptionerror('createorupdate', 'one', $e);
        } catch (QueryException $e) {
            $this->exceptionerror('createorupdate', 'two', $e);
        } catch (PDOException $e) {
            $this->exceptionerror('createorupdate', 'three', $e);
        }

    }
    public function thirdStepSubmit()
    {
        try {
            DB::beginTransaction();
            $this->validatedwizard3 = $this->validate(
                [
                    'flatfloor' => 'required',
                    'doornoofflat' => 'required',
                    'roof' => 'nullable',
                    'flooring' => 'nullable',
                    'doors' => 'nullable',
                    'windows' => 'nullable',
                    'fittings' => 'nullable',
                    'finishing' => 'nullable',
                    'assessmentno' => 'nullable',
                    'taxpaidname' => 'nullable',
                    'taxamount' => 'nullable',
                    'electricityserviceconnectionno' => 'nullable',
                    'metercardname' => 'nullable',
                    'maintenanceofflat' => 'nullable',
                    'builtuparea' => 'required|numeric',
                    'plinthareaofflat' => 'required|numeric',
                    'floorspaceindex' => 'nullable|numeric',
                    'carpetareaofflat' => 'nullable|numeric',
                    'areaoflocality' => 'nullable|numeric',
                    'usagepurpose' => 'nullable|numeric',
                    'owneroccupiedorletout' => 'nullable|numeric',
                    'monthlyrent' => 'nullable|numeric',
                    'setbacksasperplannorth' => 'nullable|numeric',
                    'setbacksasperplansouth' => 'nullable|numeric',
                    'setbacksasperplaneast' => 'nullable|numeric',
                    'setbacksasperplanwest' => 'nullable|numeric',
                    'setbacksaspersitenorth' => 'nullable|numeric',
                    'setbacksaspersitesouth' => 'nullable|numeric',
                    'setbacksaspersiteeast' => 'nullable|numeric',
                    'setbacksaspersitewest' => 'nullable|numeric',
                    'salesdeeednamelist.*.salesdeeednamelist_id' => 'nullable',
                    'salesdeeednamelist.*.name' => 'required',
                    'salesdeeednamelist.*.sdof' => 'required',
                    'plintharealist.*.plintharealist_id' => 'nullable',
                    'plintharealist.*.name' => 'required',
                    'plintharealist.*.asperplan' => 'nullable|numeric',
                    'plintharealist.*.aspersite' => 'nullable|numeric',
                    'dwellingarealist.*.dwellingarealist_id' => 'nullable',
                    'dwellingarealist.*.name' => 'required',
                    'dwellingarealist.*.asperplan' => 'nullable|numeric',
                    'dwellingarealist.*.aspersite' => 'nullable|numeric',
                ], [
                    'builtuparea.required' => 'Enter the Super built-up area',
                    'plinthareaofflat.required' => 'Enter the Plinth area',
                    'flatfloor.required' => 'Enter the flat floor',
                    'doornoofflat.required' => 'Enter the door no of flat',
                    'plintharealist.*.name.required' => 'Enter Name',
                    'plintharealist.*.asperplan.numeric' => 'Must be a number',
                    'plintharealist.*.aspersite.numeric' => 'Must be a number',
                    'dwellingarealist.*.asperplan.numeric' => 'Must be a number',
                    'dwellingarealist.*.aspersite.numeric' => 'Must be a number',
                    'dwellingarealist.*.name.required' => 'Enter Name',
                    'salesdeeednamelist.*.name.required' => 'Enter Name',
                    'salesdeeednamelist.*.sdof.required' => 'Enter S/DOF Name',
                ]
            );
            $this->validatedwizard3['valuation_id'] = $this->valuation_id;
            if ($this->wizardthreeid) {
                $wizardthree = Wizardthree::find($this->wizardthreeid)->first();
                $wizardthree->update($this->validatedwizard3);
            } else {
                $wizardthree = Wizardthree::create($this->validatedwizard3);
                $this->wizardthreeid = $wizardthree->id;
            }
            if (!empty($this->salesdeeednamelist)) {
                $this->salesdeeednamelistcreate($wizardthree);
            }
            if (!empty($this->plintharealist)) {
                $this->plintharealistcreate($wizardthree);
            }
            if (!empty($this->dwellingarealist)) {
                $this->dwellingarealistcreate($wizardthree);
            }
            DB::commit();
            $this->currentStep = 4;
        } catch (Exception $e) {
            $this->exceptionerror('createorupdate', 'one', $e);
        } catch (QueryException $e) {
            $this->exceptionerror('createorupdate', 'two', $e);
        } catch (PDOException $e) {
            $this->exceptionerror('createorupdate', 'three', $e);
        }
    }
    public function fourthStepSubmit()
    {
        try {
            DB::beginTransaction();
            $this->validatedwizard4 = $this->validate(
                [
                    'marketability' => 'required|numeric',
                    'extrapotentialvalue' => 'nullable|numeric',
                    'negativefactors' => 'nullable|numeric',
                    'compositerate' => 'nullable|numeric',
                    'adoptedcompositeratemin' => 'required|numeric',
                    'adoptedcompositeratemax' => 'required|numeric|gt:' . $this->adoptedcompositeratemin,
                    'adoptedbasiccompositerate' => 'required|numeric',
                    'buildingandservices' => 'nullable|numeric',
                    'landandothers' => 'nullable|numeric',
                    'registrarrate' => 'required|numeric',
                    'ageofbuilding' => 'required|numeric',
                    'lifeofbuilding' => 'required|numeric',
                    'salvagevalue' => 'nullable|numeric',
                    'depreciatedratio' => 'nullable',
                    'totalcompositerate' => 'required|numeric',
                    'currentmarketrate' => 'nullable|numeric',
                    'servicelifebuilding' => 'nullable|numeric',
                    'depreciationaccounted' => 'nullable|numeric',
                    'depreciatedrateconstruction' => 'required|numeric',
                    'depreciatedbuildingrate' => 'nullable|numeric',
                    'say' => 'required|numeric',
                    'pwdrate' => 'nullable|numeric',
                    'pwdservicelifebuilding' => 'nullable|numeric',
                    'pwddepreciationaccounted' => 'nullable|numeric',
                    'pwddepreciatedrateconstruction' => 'required|numeric',
                ], [
                    'say.required' => 'Enter the Say Rate',
                    'totalcompositerate.required' => 'Enter the total composite rate',
                    'ageofbuilding.required' => 'Enter the age of the building',
                    'lifeofbuilding.required' => 'Enter the life of the building',
                    'registrarrate.required' => 'Enter the Guideline Rate',
                    'adoptedbasiccompositerate.required' => 'Engter an Adopted basic composite rate',
                    'marketability.required' => 'Select marketability rate',
                    'depreciatedrateconstruction.required' => 'Enter Depreciated rate of construction',
                    'pwddepreciatedrateconstruction.required' => 'Enter Depreciated rate of construction',
                ]
            );
            $this->validatedwizard4['replacementcostofflat'] = $this->plinthareaofflat * $this->depreciatedrateconstruction;
            $this->validatedwizard4['estimatedvalueofusd'] = $this->adoptedbasiccompositerate * $this->extentofsite;
            $this->validatedwizard4['rateforlandandothers'] = round(($this->adoptedbasiccompositerate * $this->extentofsite) / $this->plinthareaofflat);
            $this->validatedwizard4['pwdreplacementcostofflat'] = $this->plinthareaofflat * $this->pwddepreciatedrateconstruction;
            $this->validatedwizard4['estimatedvalueofusd'] = $this->registrarrate * $this->extentofsite;
            $this->validatedwizard4['valuation_id'] = $this->valuation_id;
            if ($this->wizardfourid) {
                $wizardfourupdate = Wizardfour::find($this->wizardfourid);
                $wizardfourupdate->update($this->validatedwizard4);
            } else {
                $this->wizardfourid = Wizardfour::create($this->validatedwizard4)->id;
            }
            DB::commit();
            $this->currentStep = 5;
        } catch (Exception $e) {
            $this->exceptionerror('createorupdate', 'one', $e);
        } catch (QueryException $e) {
            $this->exceptionerror('createorupdate', 'two', $e);
        } catch (PDOException $e) {
            $this->exceptionerror('createorupdate', 'three', $e);
        }
    }
    public function fifthStepSubmit()
    {
        try {
            DB::beginTransaction();
            $this->validatedwizard5 = $this->validate(
                [
                    'buildingplusserviceqty' => 'nullable|numeric',
                    'buildingplusservicerate' => 'nullable|numeric',
                    'coveredcarparkqty' => 'nullable|numeric',
                    'coveredcarparkrate' => 'nullable|numeric',
                    'coveredcarparkguide' => 'nullable|numeric',
                    'liftqty' => 'nullable|numeric',
                    'liftrate' => 'nullable|numeric',
                    'liftguide' => 'nullable|numeric',
                    'modularkitchenqty' => 'nullable|numeric',
                    'modularkitchenrate' => 'nullable|numeric',
                    'modularkitchenguide' => 'nullable|numeric',
                    'superfinefinishqty' => 'nullable|numeric',
                    'superfinefinishrate' => 'nullable|numeric',
                    'superfinefinishguide' => 'nullable|numeric',
                    'interiordecorationqty' => 'nullable|numeric',
                    'interiordecorationrate' => 'nullable|numeric',
                    'interiordecorationguide' => 'nullable|numeric',
                    'electricaldepositfittingqty' => 'nullable|numeric',
                    'electricaldepositfittingrate' => 'nullable|numeric',
                    'electricaldepositfittingguide' => 'nullable|numeric',
                    'extracollapsiblegateqty' => 'nullable|numeric',
                    'extracollapsiblegaterate' => 'nullable|numeric',
                    'extracollapsiblegateguide' => 'nullable|numeric',
                    'potentialvalueqty' => 'nullable|numeric',
                    'potentialvaluerate' => 'nullable|numeric',
                    'potentialvalueguide' => 'nullable|numeric',
                ]
            );
            $this->validatedwizard5['estimatepresenttotalvalue'] = $this->say * $this->builtuparea;
            $this->validatedwizard5['guidelinepresenttotalvalue'] = $this->registrarrate * $this->extentofsite;
            $this->validatedwizard5['guidelinebuildingplusservice'] = $this->plinthareaofflat * $this->pwddepreciatedrateconstruction;
            if ($this->buildingplusserviceqty && $this->buildingplusservicerate) {
                $this->validatedwizard5['estimatebuildingplusservicerate'] = $this->buildingplusserviceqty * $this->buildingplusservicerate;
            } else {
                $this->validatedwizard5['estimatebuildingplusservicerate'] = 0;
            }
            if ($this->coveredcarparkqty && $this->coveredcarparkrate) {
                $this->validatedwizard5['estimatecoveredcarparkrate'] = $this->coveredcarparkqty * $this->coveredcarparkrate;
            } else {
                $this->validatedwizard5['estimatecoveredcarparkrate'] = 0;
            }
            if ($this->liftqty && $this->liftrate) {
                $this->validatedwizard5['estimateliftrate'] = $this->liftqty * $this->liftrate;
            } else {
                $this->validatedwizard5['estimateliftrate'] = 0;
            }
            if ($this->modularkitchenqty && $this->modularkitchenrate) {
                $this->validatedwizard5['estimatemodularkitchenrate'] = $this->modularkitchenqty * $this->modularkitchenrate;
            } else {
                $this->validatedwizard5['estimatemodularkitchenrate'] = 0;
            }
            if ($this->superfinefinishqty && $this->superfinefinishrate) {
                $this->validatedwizard5['estimatesuperfinefinishrate'] = $this->superfinefinishqty * $this->superfinefinishrate;
            } else {
                $this->validatedwizard5['estimatesuperfinefinishrate'] = 0;
            }
            if ($this->interiordecorationqty && $this->interiordecorationrate) {
                $this->validatedwizard5['estimateinteriordecorationrate'] = $this->interiordecorationqty * $this->interiordecorationrate;
            } else {
                $this->validatedwizard5['estimateinteriordecorationrate'] = 0;
            }
            if ($this->electricaldepositfittingqty && $this->electricaldepositfittingrate) {
                $this->validatedwizard5['estimateelectricaldepositfittingrate'] = $this->electricaldepositfittingqty * $this->electricaldepositfittingrate;
            } else {
                $this->validatedwizard5['estimateelectricaldepositfittingrate'] = 0;
            }
            if ($this->extracollapsiblegateqty && $this->extracollapsiblegaterate) {
                $this->validatedwizard5['estimateextracollapsiblegaterate'] = $this->extracollapsiblegateqty * $this->extracollapsiblegaterate;
            } else {
                $this->validatedwizard5['estimateextracollapsiblegaterate'] = 0;
            }
            if ($this->potentialvalueqty && $this->potentialvaluerate) {
                $this->validatedwizard5['estimatepotentialvaluerate'] = $this->potentialvalueqty * $this->potentialvaluerate;
            } else {
                $this->validatedwizard5['estimatepotentialvaluerate'] = 0;
            }
            $this->validatedwizard5['valuation_id'] = $this->valuation_id;
            if ($this->wizardfiveid) {
                $wizardfiveupdate = Wizardfive::find($this->wizardfiveid)->first();
                $wizardfiveupdate->update($this->validatedwizard5);
            } else {
                Wizardfive::create($this->validatedwizard5);
            }
            DB::commit();
            $this->currentStep = 6;
        } catch (Exception $e) {
            $this->exceptionerror('createorupdate', 'one', $e);
        } catch (QueryException $e) {
            $this->exceptionerror('createorupdate', 'two', $e);
        } catch (PDOException $e) {
            $this->exceptionerror('createorupdate', 'three', $e);
        }
    }

    public function updatedScreenshot1()
    {
        $key = array_search('screenshot1', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedScreenshot2()
    {
        $key = array_search('screenshot2', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedScreenshot3()
    {
        $key = array_search('screenshot3', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedScreenshot4()
    {
        $key = array_search('screenshot4', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedGovernmentnotification1()
    {
        $key = array_search('governmentnotification1', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedGovernmentnotification2()
    {
        $key = array_search('governmentnotification2', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedMapscreenshot()
    {
        $key = array_search('mapscreenshot', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto1()
    {
        $key = array_search('propertyphoto1', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto2()
    {
        $key = array_search('propertyphoto2', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto3()
    {
        $key = array_search('propertyphoto3', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto4()
    {
        $key = array_search('propertyphoto4', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto5()
    {
        $key = array_search('propertyphoto5', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto6()
    {
        $key = array_search('propertyphoto6', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto7()
    {
        $key = array_search('propertyphoto7', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto8()
    {
        $key = array_search('propertyphoto8', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto9()
    {
        $key = array_search('propertyphoto9', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto10()
    {
        $key = array_search('propertyphoto10', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto11()
    {
        $key = array_search('propertyphoto11', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function updatedPropertyphoto12()
    {
        $key = array_search('propertyphoto12', $this->delete_array, true);
        if ($key !== false) {
            unset($this->delete_array[$key]);
        }
    }
    public function delete($imagename)
    {
        array_push($this->delete_array, $imagename);
    }

    public function submitForm()
    {
        try {
            DB::beginTransaction();
            $this->validatedwizard6 = $this->validate(
                [
                    'screenshot1' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'screenshot2' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'screenshot3' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'screenshot4' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'governmentnotification1' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'governmentnotification2' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'mapscreenshot' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto1' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto2' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto3' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto4' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto5' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto6' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto7' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto8' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto9' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto10' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto11' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                    'propertyphoto12' => 'nullable|mimes:jpeg,jpg,png|max:2048',
                ]
            );
            $valuation = Valuation::find($this->valuation_id);
            $this->validatedwizard6['valuation_id'] = $this->valuation_id;

            if ($this->screenshot1) {
                $this->validatedwizard6['screenshot1'] = $this->uploadfile($this->wizardsixid, $this->screenshot1, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'screenshot1');
            } elseif ($this->existingscreenshot1 && in_array("existingscreenshot1", $this->delete_array)) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingscreenshot1);
                $this->validatedwizard6['screenshot1'] = null;
            } else {
                $this->validatedwizard6['screenshot1'] = $this->existingscreenshot1;
            }

            if ($this->screenshot2) {
                $this->validatedwizard6['screenshot2'] = $this->uploadfile($this->wizardsixid, $this->screenshot2, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'screenshot2');
            } elseif ($this->existingscreenshot2 && in_array("existingscreenshot2", $this->delete_array)) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingscreenshot2);
                $this->validatedwizard6['screenshot2'] = null;
            } else {
                $this->validatedwizard6['screenshot2'] = $this->existingscreenshot2;
            }

            if ($this->screenshot3) {
                $this->validatedwizard6['screenshot3'] = $this->uploadfile($this->wizardsixid, $this->screenshot3, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'screenshot3');
            } elseif ($this->existingscreenshot3 && in_array("existingscreenshot3", $this->delete_array)) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingscreenshot3);
                $this->validatedwizard6['screenshot3'] = null;
            } else {
                $this->validatedwizard6['screenshot3'] = $this->existingscreenshot3;
            }

            if ($this->screenshot4) {
                $this->validatedwizard6['screenshot4'] = $this->uploadfile($this->wizardsixid, $this->screenshot4, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'screenshot4');
            } elseif ($this->existingscreenshot4 && in_array("existingscreenshot4", $this->delete_array)) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingscreenshot4);
                $this->validatedwizard6['screenshot4'] = null;
            } else {
                $this->validatedwizard6['screenshot4'] = $this->existingscreenshot4;
            }

            if ($this->governmentnotification1) {
                $this->validatedwizard6['governmentnotification1'] = $this->uploadfile($this->wizardsixid, $this->governmentnotification1, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'governmentnotification1');
            } elseif ($this->existinggovernmentnotification1) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existinggovernmentnotification1);
                $this->validatedwizard6['governmentnotification1'] = null;
            } else {
                $this->validatedwizard6['governmentnotification1'] = $this->existinggovernmentnotification1;
            }

            if ($this->governmentnotification2) {
                $this->validatedwizard6['governmentnotification2'] = $this->uploadfile($this->wizardsixid, $this->governmentnotification2, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'governmentnotification2');
            } elseif ($this->existinggovernmentnotification2) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existinggovernmentnotification2);
                $this->validatedwizard6['governmentnotification2'] = null;
            } else {
                $this->validatedwizard6['governmentnotification2'] = $this->existinggovernmentnotification2;
            }

            if ($this->mapscreenshot) {
                $this->validatedwizard6['mapscreenshot'] = $this->uploadfile($this->wizardsixid, $this->mapscreenshot, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'mapscreenshot');
            } elseif ($this->existingmapscreenshot) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingmapscreenshot);
                $this->validatedwizard6['mapscreenshot'] = null;
            } else {
                $this->validatedwizard6['mapscreenshot'] = $this->existingmapscreenshot;
            }

            if ($this->propertyphoto1) {
                $this->validatedwizard6['propertyphoto1'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto1, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto1');
            } elseif ($this->existingpropertyphoto1) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto1);
                $this->validatedwizard6['propertyphoto1'] = null;
            } else {
                $this->validatedwizard6['propertyphoto1'] = $this->existingpropertyphoto1;
            }

            if ($this->propertyphoto2) {
                $this->validatedwizard6['propertyphoto2'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto2, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto2');
            } elseif ($this->existingpropertyphoto2) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto2);
                $this->validatedwizard6['propertyphoto2'] = null;
            } else {
                $this->validatedwizard6['propertyphoto2'] = $this->existingpropertyphoto2;
            }

            if ($this->propertyphoto3) {
                $this->validatedwizard6['propertyphoto3'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto3, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto3');
            } elseif ($this->existingpropertyphoto3) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto3);
                $this->validatedwizard6['propertyphoto3'] = null;
            } else {
                $this->validatedwizard6['propertyphoto3'] = $this->existingpropertyphoto3;
            }

            if ($this->propertyphoto4) {
                $this->validatedwizard6['propertyphoto4'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto4, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto4');
            } elseif ($this->existingpropertyphoto4) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto4);
                $this->validatedwizard6['propertyphoto4'] = null;
            } else {
                $this->validatedwizard6['propertyphoto4'] = $this->existingpropertyphoto4;
            }

            if ($this->propertyphoto5) {
                $this->validatedwizard6['propertyphoto5'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto5, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto5');
            } elseif ($this->existingpropertyphoto5) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto5);
                $this->validatedwizard6['propertyphoto5'] = null;
            } else {
                $this->validatedwizard6['propertyphoto5'] = $this->existingpropertyphoto5;
            }

            if ($this->propertyphoto6) {
                $this->validatedwizard6['propertyphoto6'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto6, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto6');
            } elseif ($this->existingpropertyphoto6) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto6);
                $this->validatedwizard6['propertyphoto6'] = null;
            } else {
                $this->validatedwizard6['propertyphoto6'] = $this->existingpropertyphoto6;
            }

            if ($this->propertyphoto7) {
                $this->validatedwizard6['propertyphoto7'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto7, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto7');
            } elseif ($this->existingpropertyphoto7) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto7);
                $this->validatedwizard6['propertyphoto7'] = null;
            } else {
                $this->validatedwizard6['propertyphoto7'] = $this->existingpropertyphoto7;
            }

            if ($this->propertyphoto8) {
                $this->validatedwizard6['propertyphoto8'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto8, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto8');
            } elseif ($this->existingpropertyphoto8) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto8);
                $this->validatedwizard6['propertyphoto8'] = null;
            } else {
                $this->validatedwizard6['propertyphoto8'] = $this->existingpropertyphoto8;
            }

            if ($this->propertyphoto9) {
                $this->validatedwizard6['propertyphoto9'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto9, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto9');
            } elseif ($this->existingpropertyphoto9) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto9);
                $this->validatedwizard6['propertyphoto9'] = null;
            } else {
                $this->validatedwizard6['propertyphoto9'] = $this->existingpropertyphoto9;
            }

            if ($this->propertyphoto10) {
                $this->validatedwizard6['propertyphoto10'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto10, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto10');
            } elseif ($this->existingpropertyphoto10) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto10);
                $this->validatedwizard6['propertyphoto10'] = null;
            } else {
                $this->validatedwizard6['propertyphoto10'] = $this->existingpropertyphoto10;
            }

            if ($this->propertyphoto11) {
                $this->validatedwizard6['propertyphoto11'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto11, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto11');
            } elseif ($this->existingpropertyphoto11) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto11);
                $this->validatedwizard6['propertyphoto11'] = null;
            } else {
                $this->validatedwizard6['propertyphoto11'] = $this->existingpropertyphoto11;
            }

            if ($this->propertyphoto12) {
                $this->validatedwizard6['propertyphoto12'] = $this->uploadfile($this->wizardsixid, $this->propertyphoto12, $valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix', 'propertyphoto12');
            } elseif ($this->existingpropertyphoto12) {
                Storage::disk('public')->delete($valuation->uniqid . '/wizardsix/screenshot', 'App\Models\Admin\Valuation\Wizardsix' . '/' . $this->existingpropertyphoto12);
                $this->validatedwizard6['propertyphoto12'] = null;
            } else {
                $this->validatedwizard6['propertyphoto12'] = $this->existingpropertyphoto12;
            }

            if ($this->wizardsixid) {
                $wizardsixupdate = Wizardsix::find($this->wizardsixid)->first();
                $wizardsixupdate->update($this->validatedwizard6);
            } else {
                Wizardsix::create($this->validatedwizard6);
            }
            DB::commit();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Valuation Process Completed Successfully']);
            redirect()->route('valuation');
        } catch (Exception $e) {
            $this->exceptionerror('createorupdate', 'one', $e);
        } catch (QueryException $e) {
            $this->exceptionerror('createorupdate', 'two', $e);
        } catch (PDOException $e) {
            $this->exceptionerror('createorupdate', 'three', $e);
        }

    }
    public function ownerlistcreate($wizardone)
    {
        foreach ($this->owner_list as $key => $eachownerlist) {
            if ($eachownerlist['ownerlist_id']) {
                $ownerlist = Ownerlist::find($eachownerlist['ownerlist_id']);
                $ownerlist->name = $eachownerlist['name'];
                $ownerlist->sdof = $eachownerlist['sdof'];
                $ownerlist->address = $eachownerlist['address'];
                $ownerlist->phone = $eachownerlist['phone'];
                if ($ownerlist->isDirty()) {
                    $ownerlist->save();
                }
            } else {
                Ownerlist::create([
                    'valuation_id' => $this->valuation_id,
                    'wizardone_id' => $wizardone->id,
                    'name' => $eachownerlist['name'],
                    'sdof' => $eachownerlist['sdof'],
                    'address' => $eachownerlist['address'],
                    'phone' => $eachownerlist['phone'],
                ]);
            }
        }
    }
    public function propertyownerlistcreate($wizardone)
    {
        foreach ($this->propertyownerlist as $key => $eachpropertyownerlist) {
            if ($eachpropertyownerlist['propertyownerlist_id']) {
                $propertyownerlist = Propertyownerlist::find($eachpropertyownerlist['propertyownerlist_id']);
                $propertyownerlist->name = $eachpropertyownerlist['name'];
                $propertyownerlist->sdof = $eachpropertyownerlist['sdof'];
                if ($propertyownerlist->isDirty()) {
                    $propertyownerlist->save();
                }
            } else {
                Propertyownerlist::create([
                    'valuation_id' => $this->valuation_id,
                    'wizardone_id' => $wizardone->id,
                    'name' => $eachpropertyownerlist['name'],
                    'sdof' => $eachpropertyownerlist['sdof'],
                ]);
            }
        }
    }

    public function salesdeeednamelistcreate($wizardthree)
    {
        foreach ($this->salesdeeednamelist as $key => $eachsalesdeeednamelist) {
            if ($eachsalesdeeednamelist['salesdeeednamelist_id']) {
                $salesdeeednamelist = Salesdeeednamelist::find($eachsalesdeeednamelist['salesdeeednamelist_id']);
                $salesdeeednamelist->name = $eachsalesdeeednamelist['name'];
                $salesdeeednamelist->sdof = $eachsalesdeeednamelist['sdof'];
                if ($salesdeeednamelist->isDirty()) {
                    $salesdeeednamelist->save();
                }
            } else {
                Salesdeeednamelist::create([
                    'valuation_id' => $this->valuation_id,
                    'wizardthree_id' => $wizardthree->id,
                    'name' => $eachsalesdeeednamelist['name'],
                    'sdof' => $eachsalesdeeednamelist['sdof'],
                ]);
            }
        }
    }

    public function plintharealistcreate($wizardthree)
    {
        foreach ($this->plintharealist as $key => $eachplintharealist) {
            if ($eachplintharealist['plintharealist_id']) {
                $plintharealist = Plintharealist::find($eachplintharealist['plintharealist_id']);
                $plintharealist->name = $eachplintharealist['name'];
                $plintharealist->asperplan = $eachplintharealist['asperplan'];
                $plintharealist->aspersite = $eachplintharealist['aspersite'];
                if ($plintharealist->isDirty()) {
                    $plintharealist->save();
                }
            } else {
                Plintharealist::create([
                    'valuation_id' => $this->valuation_id,
                    'wizardthree_id' => $wizardthree->id,
                    'name' => $eachplintharealist['name'],
                    'asperplan' => $eachplintharealist['asperplan'],
                    'aspersite' => $eachplintharealist['aspersite'],
                ]);
            }
        }
    }

    public function dwellingarealistcreate($wizardthree)
    {
        foreach ($this->dwellingarealist as $key => $eachdwellingarealist) {
            if ($eachdwellingarealist['dwellingarealist_id']) {
                $dwellingarealist = Dwellingarealist::find($eachdwellingarealist['dwellingarealist_id']);
                $dwellingarealist->name = $eachdwellingarealist['name'];
                $dwellingarealist->asperplan = $eachdwellingarealist['asperplan'];
                $dwellingarealist->aspersite = $eachdwellingarealist['aspersite'];
                if ($dwellingarealist->isDirty()) {
                    $dwellingarealist->save();
                }
            } else {
                Dwellingarealist::create([
                    'valuation_id' => $this->valuation_id,
                    'wizardthree_id' => $wizardthree->id,
                    'name' => $eachdwellingarealist['name'],
                    'asperplan' => $eachdwellingarealist['asperplan'],
                    'aspersite' => $eachdwellingarealist['aspersite'],
                ]);
            }
        }
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function render()
    {
        return view('livewire.admin.valuation.valuationprocess.valuationprocesslivewire');
    }

    protected function exceptionerror($user, $function, $trackmsg)
    {
        DB::rollback();
        Log::error("SessionID: " . session()->getId() . ' Exception ' . $function . ' ' . $trackmsg);
        Helper::trackmessage($user, $trackmsg, $function, session()->getId(), 'WEB');
        $this->toaster('error', $e->getMessage());
    }
}
