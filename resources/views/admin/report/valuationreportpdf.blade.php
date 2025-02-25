<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Valuation Report</title>

    <style>
        * {
            font-size: 15px;
        }

        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        .sno {
            text-align: center;
        }

        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
        }

        .screenshotgrid {
            display: grid;
            justify-content: space-between;
            align-content: center;
            grid-template-columns: 50% 50%;
            grid-gap: 10px;
        }

        .notificationscreenshotgrid {
            display: grid;
            justify-content: space-between;
            align-content: center;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 10px;
        }

        @media print {
            .firstpage {
                margin-top: 50%;
            }
        }

        @media print {

            .secondpage {
                page-break-before: always;
            }
        }

        @media print {

            .uploads {
                page-break-before: always;
            }
        }
    </style>
</head>

<body>
    <div id="printdiv">
        <div class="firstpage" style="text-align: center;">
            <h2 style="text-decoration:underline; font-size:18px;">
                FILE No:
                <span style="font-size:16px;">
                    @if ($valuation?->wizardone?->fileno)
                        {{ $valuation?->wizardone?->fileno }}
                    @else
                        -
                    @endif
                </span>
                Date:
                <span style="font-size:18px;">
                    @if ($valuation?->wizardone?->filedate)
                        {{ \Carbon\Carbon::parse($valuation?->wizardone?->filedate)->format('d.m.Y') }}
                    @else
                        -
                    @endif
                </span>
            </h2>
            <h1 style="text-decoration:underline;margin-top:2%;font-size:16px;">VALUATION REPORT</h1>
            <div style="font-size:28px; color:#4472c4;text-decoration:underline;">(RESIDENTIAL FLAT/APARTMENT BUILDING)
            </div style="font-size:24px; font-color:blue;text-decoration:underline;">
            <div style="margin-top:5%">
                @if ($valuation?->wizardone?->propertyownerlist)
                    @foreach ($valuation?->wizardone?->propertyownerlist as $key => $eachowner)
                        <div>
                            <div style="font-size:24px;color:#4472c4;">{{ $key + 1 }} . {{ $eachowner->name }},
                                S/D/W Of {{ $eachowner->sdof }}</div>
                        </div>
                    @endforeach
                @else
                    -
                @endif
            </div>
            <div style="font-size:24px;color:#4472c4;width:60%;margin-right:auto;margin-left:auto;">
                {{ $valuation?->wizardone?->addressofproperty }}</div>
        </div>
        <div class="secondpage" style="display:flex; justify-content:center;">
            <img style="margin-right:auto;margin-left:auto; width:100%;"
                src="{{ Storage::url($valuation?->wizardone?->engineer?->image) }}" alt="engineer">
        </div>
        <div style="text-align: center;">
            <h1 style="text-decoration:underline;font-size:20px;">VALUATION REPORT</h1>
            <div style="font-size:16px; color:#4472c4;text-decoration:underline;">(RESIDENTIAL FLAT/APARTMENT BUILDING)
            </div>
        </div>
        <p>NAME OF THE BANK: <span style="font-weight: bold">STATE BANK OF INDIA</span></p>
        <table style="width: 100%;table-layout: fixed;">
            <thead>
                <tr>
                    <th style="width:10%; font-size:18px;">S.No.</th>
                    <th style="width:45%; font-size:18px;">Particulars</th>
                    <th style="width:45%; font-size:18px;">Content</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="sno">
                        I.
                    </td>
                    <td class="heading" colspan="2">
                        General
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        1.
                    </td>
                    <td>
                        Name & address of the Valuer
                    </td>
                    <td>
                        <div style="font-weight: bold;">
                            {{ $valuation?->wizardone?->engineer?->name }} <br>
                            {{ $valuation?->wizardone?->engineer?->address }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        2.
                    </td>
                    <td style="padding: 1% 0 1% 0;">
                        Purpose for which the valuation is made
                    </td>
                    <td>
                        <div style="font-weight: bold;">
                            @if ($valuation?->wizardone?->purposeofvaluation)
                                {{ $valuation?->wizardone?->purposeofvaluation }}
                            @else
                                <div style="text-align: center;font-size:15px; font-weight:bolder">
                                    -
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        3.
                    </td>
                    <td colspan="2">

                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        a)
                    </td>
                    <td>
                        Date of Inspection
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->dateofinspection)
                            {{ \Carbon\Carbon::parse($valuation?->wizardone?->dateofinspection)->format('d.m.Y') }}
                        @else
                            <div style="text-align: center;font-weight:bolder; font-size:15px;">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        b)
                    </td>
                    <td>
                        Title Deed Number and Date
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->titledeednumberdate)
                            <div style="width: 100%">
                                {{ $valuation?->wizardone?->titledeednumberdate }}
                            </div>
                        @else
                            <div style="text-align: center;font-weight:bolder; font-size:15x;">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        c)
                    </td>
                    <td>
                        Date on which the valuation is made
                    </td>
                    <td>
                        <div>
                            @if ($valuation?->wizardone?->dateonvaluation)
                                <div>
                                    {{ \Carbon\Carbon::parse($valuation?->wizardone?->dateonvaluation)->format('d.m.Y') }}
                                </div>
                            @else
                                <div style="text-align: center;font-weight:bolder;font-size:15px;">
                                    -
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="3">
                        4.
                    </td>
                    <td rowspan="3">
                        List of documents produced for perusal
                    </td>
                    <td>
                        <div>
                            @if ($valuation?->wizardone?->document1)
                                {{ $valuation?->wizardone?->document1 }}
                            @else
                                <div style="text-align: center;font-weight:bolder; font-size:15px;">
                                    -
                                </div>
                            @endif
                        </div>
                    </td>
                <tr>
                    <td>
                        @if ($valuation?->wizardone?->document2)
                            <div style="width: 100%">
                                {{ $valuation?->wizardone?->document2 }}
                            </div>
                        @else
                            <div style="text-align: center;font-weight:bolder; font-size:15px;">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            @if ($valuation?->wizardone?->document3)
                                <div style="width: 100%">
                                    {{ $valuation?->wizardone?->document3 }}
                                </div>
                            @else
                                <div style="text-align: center;font-weight:bolder; font-size:15px;">
                                    -
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        5.
                    </td>
                    <td>
                        Name of the owner(s) and his / their address (es) with Phone no. (details of share of each owner
                        in case of joint ownership)
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->ownerlist)
                            @foreach ($valuation?->wizardone?->ownerlist as $key => $eachowner)
                                <div>
                                    <div>{{ $key + 1 }} . {{ $eachowner->name }}, S/D/W Of
                                        {{ $eachowner->sdof }}
                                    </div>
                                    <div>Address: {{ $eachowner->address }}</div>
                                    <div>Phone:{{ $eachowner->phone }}</div>
                                </div>
                            @endforeach
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        6.
                    </td>
                    <td>
                        Brief description of the property
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->propertydesccription)
                            <div>
                                {{ config('archive.propertydesccription')[$valuation?->wizardone?->propertydesccription] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        7.
                    </td>
                    <td colspan="2" class="heading">
                        LOCATION OF PROPERTY
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        a)
                    </td>
                    <td>
                        Plot No. / Survey No.
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->plotorsurveyno)
                            <div>
                                {{ $valuation?->wizardone?->plotorsurveyno }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        b)
                    </td>
                    <td>
                        Door No.
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->doorno)
                            <div>
                                {{ $valuation?->wizardone?->doorno }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        c)
                    </td>
                    <td>
                        T. S. No. / Village
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->tsnoorvillage)
                            <div>
                                {{ $valuation?->wizardone?->tsnoorvillage }} Village
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        d)
                    </td>
                    <td>
                        Ward / Taluka
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->wardortaluka)
                            <div>
                                {{ $valuation?->wizardone?->wardortaluka }} Taluka
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        e)
                    </td>
                    <td>
                        Mandal / District
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->mandalordistrict)
                            <div>
                                {{ $valuation?->wizardone?->mandalordistrict }} District
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        f)
                    </td>
                    <td>
                        Date of issue and validity of layout of approved map / plan
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->validityoflayout)
                            <div>
                                {{ $valuation?->wizardone?->validityoflayout }} Dated
                                {{ \Carbon\Carbon::parse($valuation?->wizardone?->dateofissue)->format('d.m.Y') }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        g)
                    </td>
                    <td>
                        Date of issue and validity of layout of approved map / plan
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->approvedmaporplanissuingauthority)
                            <div>
                                {{ $valuation?->wizardone?->approvedmaporplanissuingauthority }} Dated
                                {{ \Carbon\Carbon::parse($valuation?->wizardone?->approvedmapdate)->format('d.m.Y') }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        h)
                    </td>
                    <td>
                        Whether genuineness or authenticity of approved map / plan is verified
                    </td>
                    <td>
                        <div>
                            {{ $valuation?->wizardone?->plan_is_verified == 0 ? 'Plan is not verified' : 'Plan is verified' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        i)
                    </td>
                    <td>
                        Any other comments on authentic of approved plan
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->othercomments)
                            <div>
                                {{ $valuation?->wizardone?->othercomments }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        8.
                    </td>
                    <td>
                        Postal address of the property
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->propertyownerlist)
                            @foreach ($valuation?->wizardone?->propertyownerlist as $key => $eachowner)
                                <div>
                                    <div>{{ $key + 1 }} . {{ $eachowner->name }}, S/D/W Of
                                        {{ $eachowner->sdof }}
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                @if ($valuation?->wizardone?->addressofproperty)
                                    <div>
                                        Address: {{ $valuation?->wizardone?->addressofproperty }}
                                    </div>
                                @else
                                    <div>
                                        Address: <span style="font-size:13px; font-weight:bolder">-</span>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="4">
                        9.
                    </td>
                    <td>
                        City / Town
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->cityortown)
                            <div>
                                {{ $valuation?->wizardone?->cityortown }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Residential Area
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->residentialarea)
                            <div>
                                {{ $valuation?->wizardone?->residentialarea }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Commercial Area
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->commercialarea)
                            <div>
                                {{ $valuation?->wizardone?->commercialarea }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Industrial Area
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->industrialarea)
                            <div>
                                {{ $valuation?->wizardone?->industrialarea }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        10.
                    </td>
                    <td colspan="2">
                        Classification of the area
                    </td>
                </tr>
                <tr>
                    <td class="sno">I</td>
                    <td>
                        High / Middle / Poo
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->classificationofarea)
                            <div>
                                {{ config('archive.classification1')[$valuation?->wizardone?->classificationofarea] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        II
                    </td>
                    <td>
                        Urban / Semi Urban / Rural
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->classificationofarea1)
                            <div>
                                {{ config('archive.classification2')[$valuation?->wizardone?->classificationofarea1] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">11.</td>
                    <td>
                        Coming under Corporation limit / Village Panchayat / Municipality
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->propertycomesunder)
                            <div>
                                {{ config('archive.propertycomesunder')[$valuation?->wizardone?->propertycomesunder] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">12.</td>
                    <td>
                        Whether contained under any State / Central Govt. enactments (e.g. Urban Land Ceiling Act) or
                        notified under agency area / scheduled area / cantonment area
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->containedunder)
                            <div>
                                {{ $valuation?->wizardone?->containedunder }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="5">13.</td>
                    <td style="font-weight: bolder;" colspan="2">
                        Boundaries of the property
                    </td>
                </tr>
                <tr>
                    <td>
                        North
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->boundaryofpropertynorth)
                            <div>
                                {{ $valuation?->wizardone?->boundaryofpropertynorth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        South
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->boundaryofpropertysouth)
                            <div>
                                {{ $valuation?->wizardone?->boundaryofpropertysouth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        East
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->boundaryofpropertyeast)
                            <div>
                                {{ $valuation?->wizardone?->boundaryofpropertyeast }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        West
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->boundaryofpropertywest)
                            <div>
                                {{ $valuation?->wizardone?->boundaryofpropertywest }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="heading" colspan="3">
                        Dimensions of the site / flat
                    </td>
                </tr>
                <tr>
                    <td class="sno">14.</td>
                    <td>As per Deed</td>
                    <td>As existing</td>
                </tr>
                <tr>
                    <td class="sno">
                        North
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->dimensionofsiteasperdeednorth)
                            <div>
                                {{ $valuation?->wizardone?->dimensionofsiteasperdeednorth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->dimensionofsiteasexistingnorth)
                            <div>
                                {{ $valuation?->wizardone?->dimensionofsiteasexistingnorth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        South
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->dimensionofsiteasperdeedsouth)
                            <div>
                                {{ $valuation?->wizardone?->dimensionofsiteasperdeedsouth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->dimensionofsiteasexistingsouth)
                            <div>
                                {{ $valuation?->wizardone?->dimensionofsiteasexistingsouth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        East
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->dimensionofsiteasperdeedeast)
                            <div>
                                {{ $valuation?->wizardone?->dimensionofsiteasperdeedeast }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->dimensionofsiteasexistingeast)
                            <div>
                                {{ $valuation?->wizardone?->dimensionofsiteasexistingeast }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        West
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->dimensionofsiteasperdeedwest)
                            <div>
                                {{ $valuation?->wizardone?->dimensionofsiteasperdeedwest }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->dimensionofsiteasexistingwest)
                            <div>
                                {{ $valuation?->wizardone?->dimensionofsiteasexistingwest }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        15
                    </td>
                    <td>
                        Extent of the site
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->extentofsite)
                            <div>
                                {{ $valuation?->wizardone?->extentofsite }} Sqft UDS
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="3">
                        16
                    </td>
                    <td>
                        Latitude, Longitude & Co-ordinates of flat
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->longitude && $valuation?->wizardone?->latitude)
                            <div>
                                {{ $valuation?->wizardone?->latitude }} {{ $valuation?->wizardone?->longitude }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        What3words
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->what3words)
                            <div>
                                {{ $valuation?->wizardone?->what3words }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Google Map Link
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->googlemaplocation)
                            <div>
                                {{ $valuation?->wizardone?->googlemaplocation }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        17
                    </td>
                    <td>
                        Extent of the site considered for valuation (least of 13 A & 13 B)
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->extentofsite)
                            <div>
                                {{ $valuation?->wizardone?->extentofsite }} Sqft UDS
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        18.
                    </td>
                    <td>
                        Whether occupied by the owner / tenant? If occupied by tenant, since how long?
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->occupiedby)
                            <div>
                                {{ config('archive.occupiedby')[$valuation?->wizardone?->occupiedby] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" style="font-weight: bold;">
                        II
                    </td>
                    <td class="heading" colspan="2">
                        APARTMENT BUILDING
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        19.
                    </td>
                    <td>
                        Name of the Apartment
                    </td>
                    <td>
                        @if ($valuation?->wizardtwo?->nameofapartment)
                            <div>
                                {{ $valuation?->wizardtwo?->nameofapartment }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        20.
                    </td>
                    <td>
                        Description of the locality Residential / Commercial / Mixed
                    </td>
                    <td>
                        @if ($valuation?->wizardtwo?->descriptionoflocality)
                            <div>
                                {{ config('archive.descriptionoflocality')[$valuation?->wizardtwo?->descriptionoflocality] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        21.
                    </td>
                    <td>
                        Year of Construction
                    </td>
                    <td>
                        @if ($valuation?->wizardtwo?->yearofconstruction)
                            <div>
                                {{ $valuation?->wizardtwo?->yearofconstruction }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        22.
                    </td>
                    <td>
                        Number of Floors
                    </td>
                    <td>
                        @if ($valuation?->wizardtwo?->nooffloors)
                            <div>
                                {{ $valuation?->wizardtwo?->nooffloors }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        23.
                    </td>
                    <td>
                        Type of Structure
                    </td>
                    <td>
                        @if ($valuation?->wizardtwo?->typeofstructure)
                            <div>
                                {{ $valuation?->wizardtwo?->typeofstructure }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        24.
                    </td>
                    <td>
                        Number of Dwelling units in the building
                    </td>
                    <td>
                        @if ($valuation?->wizardtwo?->noofunits)
                            <div>
                                {{ $valuation?->wizardtwo?->noofunits }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        25.
                    </td>
                    <td>
                        Quality of Construction
                    </td>
                    <td>
                        @if ($valuation?->wizardtwo?->qualityofconstruction)
                            <div>
                                {{ config('archive.quality')[$valuation?->wizardtwo?->qualityofconstruction] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        26.
                    </td>
                    <td>
                        Appearance of the Building
                    </td>
                    <td>
                        @if ($valuation?->wizardtwo?->appearanceofconstruction)
                            <div>
                                {{ config('archive.quality')[$valuation?->wizardtwo?->appearanceofconstruction] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        27.
                    </td>
                    <td>
                        Maintenance of the Building
                    </td>
                    <td>
                        @if ($valuation?->wizardtwo?->maintenanceofbuilding)
                            <div>
                                {{ config('archive.quality')[$valuation?->wizardtwo?->maintenanceofbuilding] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="7">
                        28.
                    </td>
                    <td colspan="2" class="heading">
                        Facilities Available
                    </td>
                </tr>
                <tr>
                    <td>
                        Lift
                    </td>
                    <td>
                        <div>
                            {{ $valuation?->wizardtwo?->is_lift == 0 ? 'Lift Not Provided' : 'Lift Provided' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Protected Water Supply
                    </td>
                    <td>
                        <div>
                            {{ $valuation?->wizardtwo?->is_watersupply == 0 ? 'Protected Water Supply Not Provided' : 'Protected Water Supply Provided' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Underground Sewerage
                    </td>
                    <td>
                        <div>
                            {{ $valuation?->wizardtwo?->is_underwater == 0 ? 'Underground Sewerage Not Provided' : 'Underground Sewerage Provided' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Car Parking - Open/ Covered
                    </td>
                    <td>
                        <div>
                            {{ $valuation?->wizardtwo?->is_carparking == 0 ? 'Car Parking Open' : 'Car Parking Covered' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Is Compound wall existing?
                    </td>
                    <td>
                        <div>
                            {{ $valuation?->wizardtwo?->is_compoundwall == 0 ? 'Compound Wall Not Provided' : 'Compound Wall Provided' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Is pavement laid around the Building
                    </td>
                    <td>
                        <div>
                            {{ $valuation?->wizardtwo?->is_pavement == 0 ? 'Pavement laid around the building Not Provided' : 'Pavement laid around the building Provided' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        III
                    </td>
                    <td class="heading" colspan="2">
                        <div>
                            Flat
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        29.
                    </td>
                    <td>
                        The floor on which the flat is situated
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->flatfloor)
                            <div>
                                {{ $valuation?->wizardthree?->flatfloor }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        30.
                    </td>
                    <td>
                        Door No. of the flat
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->doornoofflat)
                            <div>
                                {{ $valuation?->wizardthree?->doornoofflat }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="7">
                        31.
                    </td>
                    <td colspan="2" style="font-weight:bold">
                        Specifications of the flat :
                    </td>
                </tr>
                <tr>
                    <td>
                        Roof
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->roof)
                            <div>
                                {{ $valuation?->wizardthree?->roof }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Flooring
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->flooring)
                            <div>
                                {{ $valuation?->wizardthree?->flooring }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Doors
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->doors)
                            <div>
                                {{ $valuation?->wizardthree?->doors }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Windows
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->windows)
                            <div>
                                {{ $valuation?->wizardthree?->windows }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Fittings
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->fittings)
                            <div>
                                {{ $valuation?->wizardthree?->fittings }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Finishing
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->finishing)
                            <div>
                                {{ $valuation?->wizardthree?->finishing }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="4">
                        32.
                    </td>
                    <td colspan="2" style="font-weight:bold">
                        House Tax :
                    </td>
                </tr>
                <tr>
                    <td>
                        Assessment No.
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->assessmentno)
                            <div>
                                {{ $valuation?->wizardthree?->assessmentno }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Tax paid in the name of
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->taxpaidname)
                            <div>
                                {{ $valuation?->wizardthree?->taxpaidname }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Tax amount
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->taxamount)
                            <div>
                                {{ $valuation?->wizardthree?->taxamount }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="2">33.</td>
                    <td>
                        Electricity Service Connection No.
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->electricityserviceconnectionno)
                            <div>
                                {{ $valuation?->wizardthree?->electricityserviceconnectionno }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Meter Card is in the name of
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->metercardname)
                            <div>
                                {{ $valuation?->wizardthree?->metercardname }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">34</td>
                    <td>
                        How is the maintenance of the flat?
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->maintenanceofflat)
                            <div>
                                {{ $valuation?->wizardthree?->maintenanceofflat }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">35</td>
                    <td>
                        Sale Deed executed in the name of
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->salesdeeednamelist)
                            @foreach ($valuation?->wizardthree?->salesdeeednamelist as $key => $eachowner)
                                <div>
                                    <div>{{ $key + 1 }} . {{ $eachowner->name }}, S/D/W Of
                                        {{ $eachowner->sdof }}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">36.</td>
                    <td>
                        What is the undivided area of land (UDS) as per Sale Deed?
                    </td>
                    <td>
                        @if ($valuation?->wizardone?->extentofsite)
                            <div>
                                {{ $valuation?->wizardone?->extentofsite }} Sqft UDS
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">37.</td>
                    <td>
                        What is the plinth area of the flat?
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->plinthareaofflat)
                            <div>
                                {{ $valuation?->wizardthree?->builtuparea }}Sqft -Super built-up area
                                (Including common areas), {{ $valuation?->wizardthree?->plinthareaofflat }}sqftPlinth
                                Area
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">38.</td>
                    <td>
                        What is the floor space index (app.)
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->floorspaceindex)
                            <div>
                                {{ $valuation?->wizardthree?->floorspaceindex }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">39.</td>
                    <td>
                        What is the carpet area of the flat?
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->carpetareaofflat)
                            <div>
                                {{ $valuation?->wizardthree?->carpetareaofflat }} Sqft
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">40.</td>
                    <td>
                        Is it Posh/ I class / Medium / Ordinary?
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->areaoflocality)
                            <div>
                                {{ config('archive.areaoflocality')[$valuation?->wizardthree?->areaoflocality] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">41.</td>
                    <td>
                        Is it being used for Residential or Commercial purpose?
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->usagepurpose)
                            <div>
                                {{ config('archive.usagepurpose')[$valuation?->wizardthree?->usagepurpose] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">42.</td>
                    <td>
                        Is it Owner-occupied or let out?
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->owneroccupiedorletout)
                            <div>
                                {{ config('archive.owneroccupiedorletout')[$valuation?->wizardthree?->owneroccupiedorletout] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">43.</td>
                    <td>
                        If rented, what is the monthly rent?
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->monthlyrent)
                            <div>
                                {{ $valuation?->wizardthree?->monthlyrent }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">III.</td>
                    <td class="heading" colspan="2">
                        Annexure – Technical Details
                    </td>
                </tr>
                <tr>
                    <td class="heading">
                        Setbacks
                    </td>
                    <td class="heading">
                        As per Plan in ft
                    </td>
                    <td class="heading">
                        As per Site in ft
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        North
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->setbacksasperplannorth)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->setbacksasperplannorth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->setbacksaspersitenorth)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->setbacksaspersitenorth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        South
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->setbacksasperplansouth)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->setbacksasperplansouth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->setbacksaspersitesouth)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->setbacksaspersitesouth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        East
                    </td>
                    <td class="sno">
                        @if ($valuation?->wizardthree?->setbacksasperplaneast)
                            <div>
                                {{ $valuation?->wizardthree?->setbacksasperplaneast }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td class="sno">
                        @if ($valuation?->wizardthree?->setbacksaspersiteeast)
                            <div>
                                {{ $valuation?->wizardthree?->setbacksaspersiteeast }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        West
                    </td>
                    <td class="sno">
                        @if ($valuation?->wizardthree?->setbacksasperplanwest)
                            <div>
                                {{ $valuation?->wizardthree?->setbacksasperplanwest }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td class="sno">
                        @if ($valuation?->wizardthree?->setbacksaspersitewest)
                            <div>
                                {{ $valuation?->wizardthree?->setbacksaspersitewest }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                @if ($valuation?->wizardthree?->plintharealist)
                    <tr>
                        <td class="heading">
                            Plinth area
                        </td>
                        <td class="heading">
                            As per Plan in ft
                        </td>
                        <td class="heading">
                            As per Site in ft
                        </td>
                    </tr>
                @endif
                @if ($valuation?->wizardthree?->plintharealist)
                    @foreach ($valuation?->wizardthree?->plintharealist as $eachplintharealist)
                        <tr>
                            <td class="sno">
                                @if ($eachplintharealist->name)
                                    <div class="sno">
                                        {{ $eachplintharealist->name }}
                                    </div>
                                @else
                                    <div style="text-align: center;font-size:13px; font-weight:bolder">
                                        -
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($eachplintharealist->asperplan)
                                    <div class="sno">
                                        {{ $eachplintharealist->asperplan }}
                                    </div>
                                @else
                                    <div style="text-align: center;font-size:13px; font-weight:bolder">
                                        -
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($eachplintharealist->aspersite)
                                    <div class="sno">
                                        {{ $eachplintharealist->aspersite }}
                                    </div>
                                @else
                                    <div style="text-align: center;font-size:13px; font-weight:bolder">
                                        -
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                @if ($valuation?->wizardthree?->dwellingarealist)
                    <tr>
                        <td class="heading">
                            Dwelling units
                        </td>
                        <td class="heading">
                            As per Plan in ft
                        </td>
                        <td class="heading">
                            As per Site in ft
                        </td>
                    </tr>
                @endif
                @if ($valuation?->wizardthree?->dwellingarealist)
                    @foreach ($valuation?->wizardthree?->dwellingarealist as $eachdwellingarealist)
                        <tr>
                            <td class="sno">
                                @if ($eachdwellingarealist->name)
                                    <div class="sno">
                                        {{ $eachdwellingarealist->name }}
                                    </div>
                                @else
                                    <div style="text-align: center;font-size:13px; font-weight:bolder">
                                        -
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($eachdwellingarealist->asperplan)
                                    <div class="sno">
                                        {{ $eachdwellingarealist->asperplan }}
                                    </div>
                                @else
                                    <div style="text-align: center;font-size:13px; font-weight:bolder">
                                        -
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($eachdwellingarealist->aspersite)
                                    <div class="sno">
                                        {{ $eachdwellingarealist->aspersite }}
                                    </div>
                                @else
                                    <div style="text-align: center;font-size:13px; font-weight:bolder">
                                        -
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                {{-- <tr>
                    <td class="sno">
                        South
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->dwellingareaasperplansouth)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->dwellingareaasperplansouth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->dwellingareaaspersitesouth)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->dwellingareaaspersitesouth }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        East
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->dwellingareaasperplaneast)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->dwellingareaasperplaneast }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->dwellingareaaspersiteeast)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->dwellingareaaspersiteeast }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        West
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->dwellingareaasperplanwest)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->dwellingareaasperplanwest }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($valuation?->wizardthree?->dwellingareaaspersitewest)
                            <div class="sno">
                                {{ $valuation?->wizardthree?->dwellingareaaspersitewest }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr> --}}
                <tr>
                    <td class="sno">
                        IV
                    </td>
                    <td class="heading" colspan="2">
                        MARKETABILITY
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        44
                    </td>
                    <td>
                        How is the marketability?
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->marketability)
                            <div>
                                {{ config('archive.quality')[$valuation?->wizardfour?->marketability] }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        45.
                    </td>
                    <td>
                        WHAT ARE THE FACTORS FAVORING FOR AN EXTRA POTENTIAL VALUE?
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->extrapotentialvalue)
                            <div>
                                {{ $valuation?->wizardfour?->extrapotentialvalue }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        46.
                    </td>
                    <td>
                        Any Negative factors are observed which affect the market value in general?
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->negativefactors)
                            <div>
                                {{ $valuation?->wizardfour?->negativefactors }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        V
                    </td>
                    <td class="heading" colspan="2">
                        RATE
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        47.
                    </td>
                    <td>
                        After analyzing the comparable sale instances, what is the composite rate for a similar flat
                        with same specification in the adjoining locality? – (Along with details/ reference of at-least
                        two latest deals/ transactions with respect to adjacent properties in the areas)
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->compositerate)
                            <div>
                                {{ $valuation?->wizardfour?->compositerate }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="3">
                        48.
                    </td>
                    <td colspan="2">
                        Assuming it is a new construction, what is the adopted basic composite rate of the flat under
                        valuation after comparing with the specifications and other factors with the flat under
                        comparison
                    </td>
                </tr>
                <tr>
                    <td>
                        Minimum Composite Rate
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->adoptedcompositeratemin)
                            <div>
                                Rs.{{ $valuation?->wizardfour?->adoptedcompositeratemin }}/- per Sqft
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Maximum Composite Rate
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->adoptedcompositeratemax)
                            <div>
                                Rs.{{ $valuation?->wizardfour?->adoptedcompositeratemax }}/- per Sqft
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="3">
                        49.
                    </td>
                    <td class="heading" colspan="2">
                        Break - up for the rate:
                    </td>
                </tr>
                <tr>
                    <td>
                        i) <span style="font-weight: bolder;margin-left:5px;"> |</span> Building + Services
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->buildingandservices)
                            <div>
                                Rs.{{ $valuation?->wizardfour?->buildingandservices }}/- per Sqft
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        ii) <span style="font-weight: bolder;">|</span> Land + Others
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->landandothers)
                            <div>
                                Rs.{{ $valuation?->wizardfour?->landandothers }}/- per Sqft
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        50.
                    </td>
                    <td>
                        Guideline rate obtained from the Registrar’s Office (an evidence thereof to be enclosed)[As on
                        2017
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->registrarrate)
                            <div>
                                {{ $valuation?->wizardfour?->registrarrate }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno">
                        VI
                    </td>
                    <td class="heading" colspan="2">
                        COMPOSITE RATE ADOPTED AFTER DEPRECIATION
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="8">
                        (a)
                    </td>
                    <td>
                        Age of the building
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->ageofbuilding)
                            <div>
                                {{ $valuation?->wizardfour?->ageofbuilding }} years
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Life of the building estimated
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->lifeofbuilding)
                            <div>
                                {{ $valuation?->wizardfour?->lifeofbuilding }} years
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Depreciation percentage assuming the salvage value as 10%
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->salvagevalue)
                            <div>
                                {{ $valuation?->wizardfour?->salvagevalue }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Depreciated ratio of the building
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->depreciatedratio)
                            <div>
                                {{ $valuation?->wizardfour?->depreciatedratio }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Depreciated building rate
                    </td>
                    <td>
                        <div>
                            Current market rate of construction:
                            @if ($valuation?->wizardfour?->currentmarketrate)
                                <span>Rs. {{ $valuation?->wizardfour?->currentmarketrate }} /- Sqft</span>
                            @else
                                <span style="text-align: center;font-size:13px; font-weight:bolder">
                                    -
                                </span>
                            @endif
                        </div>
                        <div>
                            Service life of Building:
                            @if ($valuation?->wizardfour?->servicelifebuilding)
                                <span> {{ $valuation?->wizardfour?->servicelifebuilding }} years</span>
                            @else
                                <span style="text-align: center;font-size:13px; font-weight:bolder">
                                    -
                                </span>
                            @endif
                        </div>
                        <div>
                            Depreciation accounted [Normal]:
                            @if ($valuation?->wizardfour?->depreciationaccounted)
                                <span> {{ $valuation?->wizardfour?->depreciationaccounted }} %</span>
                            @else
                                <span style="text-align: center;font-size:13px; font-weight:bolder">
                                    -
                                </span>
                            @endif
                        </div>
                        <div>
                            Depreciated rate of construction:
                            @if ($valuation?->wizardfour?->depreciatedrateconstruction)
                                <span>Rs. {{ $valuation?->wizardfour?->depreciatedrateconstruction }}/-</span>
                            @else
                                <span style="text-align: center;font-size:13px; font-weight:bolder">
                                    -
                                </span>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Replacement cost of flat with Services [V-3. (i)]
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->replacementcost)
                            <div>
                                Plinth area of Construction x Depreciated rate of construction =
                                {{ $valuation?->wizardthree?->plinthareaofflat }}Sqft x
                                Rs{{ $valuation?->wizardfour?->depreciatedrateconstruction }}/Sqft =
                                {{ $valuation?->wizardfour?->replacementcost }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Adopted Market rate of land
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->adoptedbasiccompositerate)
                            <div>
                                Rs.{{ $valuation?->wizardfour?->adoptedbasiccompositerate }}/Sqft
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Estimated value of UDS. Land [V-3. (ii)]
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->estimatedvalue)
                            <div>
                                Undivided share of Plot area x Adopted Market rate of land =
                                {{ $valuation?->wizardone?->extentofsite }} Sqft x
                                Rs.{{ $valuation?->wizardfour?->adoptedbasiccompositerate }}/Sqft =
                                {{ $valuation?->wizardfour?->estimatedvalue }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="5">
                        (b)
                    </td>
                    <td colspan="2" style="font-weight: bold">
                        Total composite rate arrived for valuation
                    </td>
                </tr>
                <tr>
                    <td>
                        Depreciated building rate [VI-(a.)]
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->depreciatedbuildingrate)
                            <div>
                                {{ $valuation?->wizardfour?->depreciatedbuildingrate }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Rate for Land & Others [VI-(b.)]
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->rateforlandandothers)
                            <div>
                                Estimated value of UDS of Plot/Plinth area of Construction =
                                {{ $valuation?->wizardfour?->estimatedvalue }}/{{ $valuation?->wizardthree?->plinthareaofflat }}Sqft
                                = Rs.{{ $valuation?->wizardfour?->rateforlandandothers }}/Sqft
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Total Composite Rate
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->totalcompositerate)
                            <div>
                                Rs.{{ $valuation?->wizardfour?->totalcompositerate }}/Sqft
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Say Rate
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->say)
                            <div>
                                Rs.{{ $valuation?->wizardfour?->say }}/Sqft
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="sno" rowspan="4">
                        (c)
                    </td>
                    <td colspan="2" style="font-weight: bold">
                        Total composite rate - valuation based on Tamilnadu Government Guide lines and rate of Cost of
                        construction available in PWD
                    </td>
                </tr>
                <tr>
                    <td>
                        Depreciated building rate
                    </td>
                    <td>
                        <div>
                            PWD rate of construction:
                            @if ($valuation?->wizardfour?->pwdrate)
                                <span>
                                    Rs.{{ $valuation?->wizardfour?->pwdrate }}/- Sqft
                                </span>
                            @else
                                <span style="text-align: center;font-size:13px; font-weight:bolder">
                                    -
                                </span>
                            @endif
                        </div>
                        <div>
                            Incremental for City area =
                            @if ($valuation?->wizardfour?->pwdrate)
                                <span>1.20 x {{ $valuation?->wizardfour?->pwdrate }} =
                                    {{ 1.2 * $valuation?->wizardfour?->pwdrate }}</span>
                            @else
                                <span style="text-align: center;font-size:13px; font-weight:bolder">
                                    -
                                </span>
                            @endif
                        </div>
                        <div>
                            Service life of Building:
                            @if ($valuation?->wizardfour?->pwdservicelifebuilding)
                                <span>{{ $valuation?->wizardfour?->pwdservicelifebuilding }}</span>
                            @else
                                <span style="text-align: center;font-size:13px; font-weight:bolder">
                                    -
                                </span>
                            @endif
                        </div>
                        <div>
                            Depreciation accounted [PWD]:
                            @if ($valuation?->wizardfour?->pwddepreciationaccounted)
                                <span>{{ $valuation?->wizardfour?->pwddepreciationaccounted }}%</span>
                            @else
                                <span style="text-align: center;font-size:13px; font-weight:bolder">
                                    -
                                </span>
                            @endif
                        </div>
                        <div>
                            Depreciated rate of construction:
                            @if ($valuation?->wizardfour?->pwddepreciatedrateconstruction)
                                <span>Rs{{ $valuation?->wizardfour?->pwddepreciatedrateconstruction }}</span>
                            @else
                                <span style="text-align: center;font-size:13px; font-weight:bolder">
                                    -
                                </span>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Replacement cost of flat with Services [V-3. (i)]
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->pwdreplacementcostofflat)
                            <div>
                                Plinth area of Construction x Depreciated rate of construction =
                                {{ $valuation?->wizardthree?->plinthareaofflat }}Sqft x
                                Rs.{{ $valuation?->wizardfour?->pwddepreciatedrateconstruction }}/Sqft =
                                Rs.{{ $valuation?->wizardfour?->pwdreplacementcostofflat }}/-
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Estimated value of UDS. Land [V-3. (ii)]
                    </td>
                    <td>
                        @if ($valuation?->wizardfour?->pwdestimatedvalueofusd)
                            <div>
                                Undivided share of Plot area x Guideline rate obtained from the Registrar’s Office =
                                {{ $valuation?->wizardone?->extentofsite }}Sqft x
                                {{ $valuation?->wizardfour?->registrarrate }} =
                                {{ $valuation?->wizardfour?->pwdestimatedvalueofusd }}
                            </div>
                        @else
                            <div style="text-align: center;font-size:15px; font-weight:bolder">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>Details of Valuation</h3>
        @php
            $estimatetotal = $valuation?->wizardfive?->estimatebuildingplusservicerate + $valuation?->wizardfive?->estimatecoveredcarparkrate + $valuation?->wizardfive?->estimateliftrate + $valuation?->wizardfive?->estimatemodularkitchenrate + $valuation?->wizardfive?->estimatesuperfinefinishrate + $valuation?->wizardfive?->estimateinteriordecorationrate + $valuation?->wizardfive?->estimateelectricaldepositfittingrate + $valuation?->wizardfive?->estimateextracollapsiblegaterate + $valuation?->wizardfive?->estimatepotentialvaluerate + $valuation?->wizardfive?->estimatepresenttotalvalue;
            
            $guidelinetotal = $valuation?->wizardfour?->pwdestimatedvalueofusd + $valuation?->wizardfive?->coveredcarparkguide + $valuation?->wizardfive?->liftguide + $valuation?->wizardfive?->modularkitchenguide + $valuation?->wizardfive?->superfinefinishguide + $valuation?->wizardfive?->interiordecorationguide + $valuation?->wizardfive?->electricaldepositfittingguide + $valuation?->wizardfive?->extracollapsiblegateguide + $valuation?->wizardfive?->potentialvalueguide + $valuation?->wizardfive?->guidelinepresenttotalvalue;
        @endphp
        <table style="width: 100%;table-layout: fixed; text-align:center;">
            <thead>
                <tr>
                    <th>
                        s.no
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Qty
                    </th>
                    <th>
                        Rate/unit
                    </th>
                    <th>
                        Estimated Value
                    </th>
                    <th>
                        Guide line Value
                    </th>
                </tr>
            </thead>
            <tr>
                <td class="sno">
                    1.
                </td>
                <td>
                    Present Total value of the flat (incl. Car Parking), As on date
                </td>
                <td>
                    @if ($valuation?->wizardthree?->builtuparea)
                        <div>
                            {{ $valuation?->wizardthree?->builtuparea }} Sqft
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfour?->totalcompositerate)
                        <div>
                            Rs. {{ $valuation?->wizardfour?->totalcompositerate }}/- per Sqft
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimatepresenttotalvalue)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->estimatepresenttotalvalue }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->guidelinepresenttotalvalue)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->guidelinepresenttotalvalue }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">
                    2.
                </td>
                <td>
                    Building plus Services
                </td>
                <td>
                    @if ($valuation?->wizardfive?->buildingplusserviceqty)
                        <div>
                            {{ $valuation?->wizardfive?->buildingplusserviceqty }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->buildingplusservicerate)
                        <div>
                            Rs.{{ $valuation?->wizardfive?->buildingplusservicerate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimatebuildingplusservicerate)
                        <div>
                            Rs. {{ $valuation?->wizardthree?->estimatebuildingplusservicerate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfour?->pwdreplacementcostofflat)
                        <div>
                            Rs. {{ $valuation?->wizardfour?->pwdreplacementcostofflat }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">
                    3.
                </td>
                <td>
                    Covered Car Parking
                </td>
                <td>
                    @if ($valuation?->wizardfive?->coveredcarparkqty)
                        <div>
                            {{ $valuation?->wizardfive?->coveredcarparkqty }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->coveredcarparkrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->coveredcarparkrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimatecoveredcarparkrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->estimatecoveredcarparkrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->coveredcarparkguide)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->coveredcarparkguide }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">
                    4.
                </td>
                <td>
                    Lift
                </td>
                <td>
                    @if ($valuation?->wizardfive?->liftqty)
                        <div>
                            {{ $valuation?->wizardfive?->liftqty }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->liftrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->liftrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimateliftrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->estimateliftrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->liftguide)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->liftguide }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">
                    5.
                </td>
                <td>
                    Modular Kitchen Arrangements
                </td>
                <td>
                    @if ($valuation?->wizardfive?->modularkitchenqty)
                        <div>
                            {{ $valuation?->wizardfive?->modularkitchenqty }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->modularkitchenrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->modularkitchenrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimatemodularkitchenrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->estimatemodularkitchenrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->modularkitchenguide)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->modularkitchenguide }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">
                    6.
                </td>
                <td>
                    Superfine Finish
                </td>
                <td>
                    @if ($valuation?->wizardfive?->superfinefinishqty)
                        <div>
                            {{ $valuation?->wizardfive?->superfinefinishqty }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->superfinefinishrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->superfinefinishrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimatesuperfinefinishrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->estimatesuperfinefinishrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->superfinefinishguide)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->superfinefinishguide }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">
                    7.
                </td>
                <td>
                    Interior Decorations
                </td>
                <td>
                    @if ($valuation?->wizardfive?->interiordecorationqty)
                        <div>
                            {{ $valuation?->wizardfive?->interiordecorationqty }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->interiordecorationrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->interiordecorationrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimateinteriordecorationrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->estimateinteriordecorationrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->interiordecorationguide)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->interiordecorationguide }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">
                    8.
                </td>
                <td>
                    Electricity deposits / electrical fittings, etc.
                </td>
                <td>
                    @if ($valuation?->wizardfive?->electricaldepositfittingqty)
                        <div>
                            {{ $valuation?->wizardfive?->electricaldepositfittingqty }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->electricaldepositfittingrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->electricaldepositfittingrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimateelectricaldepositfittingrate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->estimateelectricaldepositfittingrate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->electricaldepositfittingguide)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->electricaldepositfittingguide }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">
                    9.
                </td>
                <td>
                    Extra collapsible gates / grill works etc.
                </td>
                <td>
                    @if ($valuation?->wizardfive?->extracollapsiblegateqty)
                        <div>
                            {{ $valuation?->wizardfive?->extracollapsiblegateqty }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->extracollapsiblegaterate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->extracollapsiblegaterate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimateextracollapsiblegaterate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->estimateextracollapsiblegaterate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->extracollapsiblegateguide)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->extracollapsiblegateguide }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">
                    10.
                </td>
                <td>
                    Potential value, if any
                </td>
                <td>
                    @if ($valuation?->wizardfive?->potentialvalueqty)
                        <div>
                            {{ $valuation?->wizardfive?->potentialvalueqty }}
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->potentialvaluerate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->potentialvaluerate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->estimatepotentialvaluerate)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->estimatepotentialvaluerate }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
                <td>
                    @if ($valuation?->wizardfive?->potentialvalueguide)
                        <div>
                            Rs. {{ $valuation?->wizardfive?->potentialvalueguide }}/-
                        </div>
                    @else
                        <div style="text-align: center;font-size:13px; font-weight:bolder">
                            -
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="sno">

                </td>
                <td>
                    Total
                </td>
                <td>

                </td>
                <td>

                </td>
                <td>
                    <div>
                        Rs.{{ $estimatetotal }}/-
                    </div>
                </td>
                <td>
                    <div>
                        Rs. {{ $guidelinetotal }}/-
                    </div>
                </td>
            </tr>
        </table>
        <div style="margin-top: 1%;">
            (Valuation: Here, the approved valuer should discuss in details his approach to valuation of property and
            indicate how the value has been arrived at, supported by necessary calculation. Also, such aspects as
            impending threat of acquisition by government for road widening / public service purposes, sub merging &
            applicability of CRZ provisions (Distance from sea-coast / tidal level must be incorporated) and their
            effect on i) saleability ii) likely rental value in future and iii) any likely income it may generate may be
            discussed).
        </div>
        <div class="otherdetails">
            <p>The other details are as under:</p>
            <p>vii.Date of purchase of immovable property:</p>
            <p>viii.Purchase Price of immovable property: </p>
            <p>ix.Book value of immovable property: {{ $estimatetotal }}/-</p>
            <p>x.Realizable Value of immovable property: 0.90x{{ $estimatetotal }}= {{ 0.9 * $estimatetotal }}/-</p>
            <p>xi.Distress Sale Value of immovable property: 0.80 x {{ $estimatetotal }}/- =
                {{ 0.8 * $estimatetotal }}/-</p>
            <p>xii.Guideline Value (value as per Circle Rates), if applicable,<br>
                in the area where Immovable property is situated. {{ $guidelinetotal }}/-</p>
        </div>
        <div style="display:flex;justify-content: space-between; margin-top:40px;">
            <div>
                Place: <br>
                Date:
            </div>
            <div>
                <p>Signature</p>
            </div>
        </div>

        <div>
            <p>(Name an Official seal of the Approved Valuer)</p>
            <p>Encl: 1. Declaration from the valuer</p>
            <p>2. Model code of conduct for valuer</p>
            <p>3. Photograph of owner with the property in the background</p>
            <p>4. Screen shot (in hard copy) of Global Positioning System (GPS)/<br>
                Various Applications (Apps)/Internet sites (eg Google earth)/etc</p>
            <p> 5. Layout plan of the area in which the property is located</p>
            <p>6. Building plan & Floor plan</p>
            <p>7. Any other relevant documents/extracts</p>
        </div>
        <div>
            <p>The undersigned has inspected the property detailed in the Valuation Report dated:<span
                    style="margin-left:10%;">on</span></p>
            We are satisfied that the fair and reasonable market value of the property is Rs.<span
                style="color:#4472c4;">{{ $estimatetotal }}/-</span>
        </div>
        <div>
            <div style="margin-top:65px;">
                <h1 style="text-decoration:underline; text-align:center;font-size:13px;">STRUCTURAL STABILITY
                    CERTIFICATE</h1>
            </div>
            <div>
                I hereby declare that the Residential building
                <span style="color:#4472c4;">
                    @if ($valuation?->wizardone?->propertyownerlist)
                        @foreach ($valuation?->wizardone?->propertyownerlist as $key => $eachowner)
                            <span>{{ $key + 1 }} . {{ $eachowner->name }}, S/D/W Of
                                {{ $eachowner->sdof }}</span>,
                        @endforeach
                    @else
                        -
                    @endif
                    {{ $valuation?->wizardone?->addressofproperty }},
                </span> has been inspected by me and has been constructed as per the area details on Page Nos. 2 & 3.
            </div>
        </div>
        <div>
            It is stated that the building is of {{ $valuation?->wizardfour?->ageofbuilding }} - years-old & in good
            condition and structurally sound as per the appearance. The expected future life of the building is for
            another {{ $valuation?->wizardfour?->lifeofbuilding }} years with Proper maintenance.
        </div>
        <div style="margin-top:5%;display:flex;justify-content: end;">
            <div>
                <div>
                    Signature of the Chartered Engineer& Structural Engineer
                </div>
                <div style="color:#4472c4;">
                    Date: <br>
                    Place: F – 5, 227.First Floor, Kutchery Road, Mylapore. Chennai – 600 004<br>
                    Residential Address: 34/83, Mandaveli Street, Mandaveli, Chennai – 600 028<br>
                    SBI Bank panel approval: LHO/CCO/CPM/8 Dated: 07.09.2021<br>
                    Fellow in [FIA.StrucE – F – 358], Indian Association of Structural Engineers<br>
                    Name & address of the Institution with which registered:<br>
                    Institution of Engineers [India], Kolkatta, Regn No: M 118935 – 7 [04.08.2000]<br>
                    Central Govt. Regd. Approved Valuer [No: F-10187] for Income Tax & Wealth Tax
                </div>
            </div>
        </div>
        @if ($valuation?->wizardsix?->screenshot1)
            <div class="uploads">
                <h2 style="font-size:13px;">
                    Screen shots taken from internet websites for property
                </h2>
            </div>
        @endif
        <div style="display:grid; justify-content: center;">
            @if ($valuation?->wizardsix?->screenshot1)
                <div style="margin-top:100px;">
                    <img style="width:90%;height:100%;"
                        src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->screenshot1) }}"
                        alt="screenshot1">
                </div>
            @endif
        </div>
        <div style="display:grid; justify-content: center;">
            @if ($valuation?->wizardsix?->screenshot2)
                <div class="uploads" style="margin-top:100px;">
                    <img style="width:90%;height:100%;"
                        src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->screenshot2) }}"
                        alt="screenshot2">
                </div>
            @endif
        </div>
        <div style="display:grid; justify-content: center;">
            @if ($valuation?->wizardsix?->screenshot3)
                <div class="uploads" style="margin-top:100px;">
                    <img style="width:90%;height:100%;"
                        src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->screenshot3) }}"
                        alt="screenshot3">
                </div>
            @endif
        </div>
        <div style="display:grid; justify-content: center;">
            @if ($valuation?->wizardsix?->screenshot4)
                <div class="uploads" style="margin-top:100px;">
                    <img style="width:90%;height:100%;"
                        src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->screenshot4) }}"
                        alt="screenshot4">
                </div>
            @endif
        </div>
        @if ($valuation?->wizardsix?->governmentnotification1)
            <div class="uploads">
                <h2 style="font-size:16px;">
                    Government Notifications
                </h2>
            </div>
        @endif
        <div style="display:grid; justify-content: center;">
            @if ($valuation?->wizardsix?->governmentnotification1)
                <div sstyle="margin-top:100px;">
                    <img style="width:90%;height:900px;"
                        src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->governmentnotification1) }}"
                        alt="governmentnotification1">
                </div>
            @endif
        </div>
        <div style="display:grid; justify-content: center;">
            @if ($valuation?->wizardsix?->governmentnotification2)
                <div class="uploads" style="margin-top:100px;">
                    <img style="width:90%;height:900px;"
                        src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->governmentnotification2) }}"
                        alt="governmentnotification2">
                </div>
            @endif
        </div>
        @if ($valuation?->wizardsix?->mapscreenshot)
            <div class="uploads">
                <h2 style="font-size:16px;">
                    Map Screenshot
                </h2>
            </div>
        @endif
        <div style="display:grid; justify-content: center;">
            @if ($valuation?->wizardsix?->mapscreenshot)
                <div>
                    <img style="width:90%;height:900px;"
                        src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->mapscreenshot) }}"
                        alt="mapscreenshot">
                </div>
            @endif
        </div>
        @if ($valuation?->wizardsix?->propertyphoto1)
            <div class="uploads">
                <h2 style="font-size:16px;">
                    Property Photos
                </h2>
            </div>
        @endif
        <div>
            <div style="display:grid; justify-content: center;">

                @if ($valuation?->wizardsix?->propertyphoto1)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto1) }}"
                            alt="propertyphoto1">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto2)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto2) }}"
                            alt="propertyphoto2">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto3)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto3) }}"
                            alt="propertyphoto3">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto4)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto4) }}"
                            alt="propertyphoto4">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto5)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto5) }}"
                            alt="propertyphoto5">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto6)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto6) }}"
                            alt="propertyphoto6">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto7)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto7) }}"
                            alt="propertyphoto7">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto8)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto8) }}"
                            alt="propertyphoto8">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto9)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto9) }}"
                            alt="propertyphoto9">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto10)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto10) }}"
                            alt="propertyphoto10">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto11)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto11) }}"
                            alt="propertyphoto11">
                    </div>
                @endif
                @if ($valuation?->wizardsix?->propertyphoto12)
                    <div style="margin-top:20px;">
                        <img style="width:100%;height:200px;"
                            src="{{ Storage::url($valuation->uniqid . '/wizardsix/screenshot/' . $valuation->wizardsix->propertyphoto12) }}"
                            alt="propertyphoto12">
                    </div>
                @endif
            </div>
        </div>
        @if ($show == 1)
            <script>
                function printreceipt() {
                    var printContents = document.getElementById('printdiv').innerHTML;
                    var print = document.body.innerHTML = printContents;
                    window.print();
                    window.onafterprint = window.close;
                }
                window.onload = printreceipt();
            </script>
        @endif
</body>

</html>
