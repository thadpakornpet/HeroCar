@extends('layouts.master')
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('master.company')</strong>
        </span>
    </nav>
    
    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-menu-right-icon icmn-cog"></span>
                <span class="cui-utils-title">
                    @lang('master.company')
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                            
                                @if(!empty($company[0]->id))
                                    <form action="{{ route( 'company.update',$company[0]->id) }}" method="post" class="form-horizontal">
                                {{ method_field('PUT') }}
                                {!! csrf_field() !!}
                                <div class="form-group row">
                                                        
                                                        <label for="type_business" class="col-md-1 control-label">@lang('company.typecompany')</label>
                            
                                                        <div class="col-md-5">
                                                           
                                                            <select id="type_business" class="form-control" name="type_business" required>
                                                               
                                                          
                         <option value='0' {!! $company[0]->type_business == 0 ? 'selected' : '' !!}> -- @lang('logs.select') --</option> 
                         <option value='1' {!! $company[0]->type_business == 1 ? 'selected' : '' !!}>@lang('company.advertising')</option> 
                         <option value='2' {!! $company[0]->type_business == 2 ? 'selected' : '' !!}>@lang('company.automotive')</option> 
                         <option value='3'{!! $company[0]->type_business == 3 ? 'selected' : '' !!}>@lang('company.chemical-plastic')</option> 
                         <option value='4'{!! $company[0]->type_business == 4 ? 'selected' : '' !!}>@lang('company.construction-construction-materials')</option> 
                         <option value='5'{!! $company[0]->type_business == 5 ? 'selected' : '' !!}>@lang('company.design-decorate')</option> 
                         <option value='6'{!! $company[0]->type_business == 6 ? 'selected' : '' !!}>@lang('company.energy')</option> 
                         <option value='7'{!! $company[0]->type_business == 7 ? 'selected' : '' !!}>@lang('company.financial-institution-loans-credit-cards')</option> 
                         <option value='8'{!! $company[0]->type_business == 8 ? 'selected' : '' !!}>@lang('company.clothing-textile')</option> 
                         <option value='9'{!! $company[0]->type_business == 9 ? 'selected' : '' !!}>@lang('company.hospital-medical')</option> 
                         <option value='10'{!! $company[0]->type_business == 10 ? 'selected' : '' !!}>@lang('company.import-export')</option> 
                         <option value='11'{!! $company[0]->type_business == 11 ? 'selected' : '' !!}>@lang('company.jewelry-gemstones')</option> 
                         <option value='12'{!! $company[0]->type_business == 12 ? 'selected' : '' !!}>@lang('company.packaging')</option> 
                        <option value='13'{!! $company[0]->type_business == 13 ? 'selected' : '' !!}>@lang('company.publishing')</option> 
                          <option value='14'{!! $company[0]->type_business == 14 ? 'selected' : '' !!}>@lang('company.recruitment')</option> 
                          <option value='15'{!! $company[0]->type_business == 15 ? 'selected' : '' !!}>@lang('company.service')</option> 
                         <option value='16'{!! $company[0]->type_business == 16 ? 'selected' : '' !!}>@lang('company.transportation')</option> 
                          <option value='17'{!! $company[0]->type_business == 17 ? 'selected' : '' !!}>@lang('company.department-store')</option> 
                          <option value='18'{!! $company[0]->type_business == 18 ? 'selected' : '' !!}>@lang('company.metal-steel-industry')</option> 
                          <option value='19'{!! $company[0]->type_business == 19 ? 'selected' : '' !!}>@lang('company.mass-media')</option> 
                          <option value='20'{!! $company[0]->type_business == 20 ? 'selected' : '' !!}>@lang('company.agribusiness')</option> 
                          <option value='21'{!! $company[0]->type_business == 21 ? 'selected' : '' !!}>@lang('company.banking')</option> 
                         <option value='22'{!! $company[0]->type_business == 22 ? 'selected' : '' !!}>@lang('company.computer')</option> 
                          <option value='23'{!! $company[0]->type_business == 23 ? 'selected' : '' !!}>@lang('company.advisor')</option> 
                          <option value='24'{!! $company[0]->type_business == 24 ? 'selected' : '' !!}>@lang('company.education')</option> 
                          <option value='25'{!! $company[0]->type_business == 25 ? 'selected' : '' !!}>@lang('company.electronic-industry')</option> 
                          <option value='26'{!! $company[0]->type_business == 26 ? 'selected' : '' !!}>@lang('company.entertainment')</option> 
                         <option value='27'{!! $company[0]->type_business == 27 ? 'selected' : '' !!}>@lang('company.food-beverage')</option> 
                          <option value='28'{!! $company[0]->type_business == 28 ? 'selected' : '' !!}>@lang('company.civil-enterprise-foundation-organization')</option> 
                          <option value='29'{!! $company[0]->type_business == 29 ? 'selected' : '' !!}>@lang('company.hotel-resort')</option> 
                          <option value='30'{!! $company[0]->type_business == 30 ? 'selected' : '' !!}>@lang('company.life-insurance')</option> 
                          <option value='31'{!! $company[0]->type_business == 31 ? 'selected' : '' !!}>@lang('company.pharmaceutical-cosmetic')</option> 
                          <option value='32'{!! $company[0]->type_business == 32 ? 'selected' : '' !!}>@lang('company.stationery-paper')</option> 
                         <option value='33'{!! $company[0]->type_business == 33 ? 'selected' : '' !!}>@lang('company.real-estate')</option> 
                         <option value='34'{!! $company[0]->type_business == 34 ? 'selected' : '' !!}>@lang('company.retail')</option> 
                         <option value='35'{!! $company[0]->type_business == 35 ? 'selected' : '' !!}>@lang('company.communication-and-telecommunication')</option> 
                         <option value='36'{!! $company[0]->type_business == 36 ? 'selected' : '' !!}>@lang('company.tourism')</option> 
                         <option value='37'{!! $company[0]->type_business == 37 ? 'selected' : '' !!}>@lang('company.law')</option> 
                         <option value='38'{!! $company[0]->type_business == 38 ? 'selected' : '' !!}>@lang('company.wood-furniture-appliances')</option> 
                         <option value='39'{!! $company[0]->type_business == 39 ? 'selected' : '' !!}>@lang('company.direct-sales')</option> 
                         <option value='40'{!! $company[0]->type_business == 40 ? 'selected' : '' !!}>@lang('company.other')</option> 
                        
                                                      
                                                                
                                                             
                                                                </select>
                                                        </div>

                                                        <label for="vat" class="col-md-1 control-label">@lang('company.taxid') :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="vat" type="text" value="{!! $company[0]->vat !!}" class="form-control" name="vat" required>
                                                    </div>
                                                    </div>
                        
                        
                                                    <div class="form-group row">
                                                    <label for="name_business_th"  class="col-md-1 control-label">@lang('company.nameth') :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="name_business_th" value="{!! $company[0]->name_business_th !!}" type="text" class="form-control" name="name_business_th" required>
                                                    </div>

                                                    <label for="name_business_eng" class="col-md-1 control-label">@lang('company.nameen') :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="name_business_eng" value="{!! $company[0]->name_business_eng !!}" type="text" class="form-control" name="name_business_eng" required>
                                                    </div>
                                                </div>
                        
                        
                                                <div class="form-group row">
                                                    <label for="address_company" class="col-md-1 control-label">@lang('company.address') :</label>
                        
                                                    <div class="col-md-5">
                                                        <textarea id="address_company" type="text" class="form-control" name="address_company" required>{!! $company[0]->address_company !!}</textarea>
                                                    </div>

                                                    <label for="size" class="col-md-1 control-label">@lang('company.office') : :</label>
                        
                                                    <div class="col-md-5">
                                                      
                                                            <div class="btn-group" data-toggle="buttons">
                                                                    <label class="btn @if($company[0]->size == 2) btn-outline-primary @else btn-primary @endif">
                                                                      <input type="radio" name="size" value="1" @if($company[0]->size == 1) checked @endif/>
                                                                      @lang('company.small')
                                                                    </label>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <label class="btn @if($company[0]->size != 2) btn-outline-primary @else btn-primary @endif">
                                                                      <input type="radio" name="size" value="2"  @if($company[0]->size == 2) checked @endif/>
                                                                      @lang('company.big')
                                                                    </label>
                                                                  </div>
                        
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="phone_office" class="col-md-1 control-label">@lang('company.phone') :</label>
                        
                                                    <div class="col-md-3">
                                                        <input id="phone_office" value="{!! $company[0]->phone_office !!}" type="text" class="form-control" name="phone_office" required>
                                                    </div>

                                                    <label for="phone" class="col-md-1 control-label">@lang('company.mobile') :</label>
                        
                                                    <div class="col-md-3">
                                                        <input id="phone" value="{!! $company[0]->phone !!}" type="text" class="form-control" name="phone" required>
                                                    </div>

                                                    <label for="website" class="col-md-1 control-label">@lang('company.website') :</label>
                        
                                                    <div class="col-md-3">
                                                    <input id="website" value="{!! $company[0]->website !!}" type="text" class="form-control" name="website" required>
                                                    </div>
                                                </div>
                        
                        
                                                <div class="form-group pull-right">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            @lang('logs.save')
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                        
                        
                                @else
                            <form action="{!! route('company.store') !!}" method="post" class="form-horizontal">
                                {!! csrf_field() !!}
                        
                                <div class="form-group row">
                                                        
                                                        <label for="type_business" class="col-md-1 control-label">@lang('company.typecompany') :</label>
                            
                                                        <div class="col-md-5">
                                                           
                                                            <select id="type_business" class="form-control" name="type_business" required>
                                                                                <option value='0'> -- @lang('logs.select') --</option>
                                                                                <option value='1' >@lang('company.advertising')</option>
                                                                <option value='2' >@lang('company.automotive')</option> 
                                                                <option value='3' >@lang('company.chemical-plastic')</option> 
                                                                <option value='4' >@lang('company.construction-construction-materials')</option> 
                                                                <option value='5' >@lang('company.design-decorate')</option> 
                                                                <option value='6' >@lang('company.energy')</option> 
                                                                <option value='7' >@lang('company.financial-institution-loans-credit-cards')</option> 
                                                                <option value='8' >@lang('company.clothing-textile')</option> 
                                                                <option value='9' >@lang('company.hospital-medical')</option> 
                        
                        
                                                                <option value='10' >@lang('company.import-export')</option> 
                                                                <option value='11' >@lang('company.jewelry-gemstones')</option> 
                                                                <option value='12' >@lang('company.packaging')</option> 
                                                                <option value='13' >@lang('company.publishing')</option> 
                                                                <option value='14' >@lang('company.recruitment')</option> 
                                                                <option value='15' >@lang('company.service')</option> 
                                                                <option value='16' >@lang('company.transportation')</option> 
                                                                <option value='17' >@lang('company.department-store')</option> 
                                                                <option value='18' >@lang('company.metal-steel-industry')</option> 
                                                                <option value='19' >@lang('company.mass-media')</option> 
                        
                        
                                                                <option value='20' >@lang('company.agribusiness')</option> 
                                                                <option value='21' >@lang('company.banking')</option> 
                                                                <option value='22' >@lang('company.computer')</option> 
                                                                <option value='23' >@lang('company.advisor')</option> 
                                                                <option value='24' >@lang('company.education')</option> 
                                                                <option value='25' >@lang('company.electronic-industry')</option> 
                                                                <option value='26' >@lang('company.entertainment')</option> 
                                                                <option value='27' >@lang('company.food-beverage')</option> 
                                                                <option value='28' >@lang('company.civil-enterprise-foundation-organization')</option> 
                                                                <option value='29' >@lang('company.hotel-resort')</option> 
                                                              
                                                                <option value='30' >@lang('company.life-insurance')</option> 
                                                                <option value='31' >@lang('company.pharmaceutical-cosmetic')</option> 
                                                                <option value='32' >@lang('company.stationery-paper')</option> 
                                                                <option value='33' >@lang('company.real-estate')</option> 
                                                                <option value='34' >@lang('company.retail')</option> 
                        
                        
                        
                                                                <option value='35' >@lang('company.communication-and-telecommunication')</option> 
                                                                <option value='36' >@lang('company.tourism')</option> 
                        
                                                                <option value='37' >@lang('company.law')</option> 
                        
                                                                <option value='38' >@lang('company.wood-furniture-appliances')</option> 
                                                                <option value='39' >@lang('company.direct-sales')</option> 
                        
                                                                <option value='40' >@lang('company.other')</option> 
                                                                
                                                                
                                                                </select>
                                                        </div>
                                                        <label for="vat" class="col-md-1 control-label">@lang('company.taxid') :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="vat" type="text" class="form-control" name="vat" required>
                                                    </div>
                                                    </div>
                        
                        
                                                    <div class="form-group row">
                                                    <label for="name_business_th" class="col-md-1 control-label">@lang('company.nameth')</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="name_business_th" type="text" class="form-control" name="name_business_th" required>
                                                    </div>

                                                    <label for="name_business_eng" class="col-md-1 control-label">@lang('company.nameen') :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="name_business_eng" type="text" class="form-control" name="name_business_eng" required>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="address_company" class="col-md-1 control-label">@lang('company.address') :</label>
                        
                                                    <div class="col-md-5">
                                                        <textarea id="address_company" type="text" class="form-control" name="address_company" required></textarea>
                                                    </div>

                                                    <label for="size" class="col-md-1 control-label">@lang('company.office') :</label>
                        
                                                    <div class="col-md-5">
                                                    <div class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-outline-primary">
                                                              <input type="radio" name="size" value="1"/>
                                                              @lang('company.small')
                                                            </label>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <label class="btn btn-outline-primary">
                                                              <input type="radio" name="size" value="2"/>
                                                              @lang('company.big')
                                                            </label>
                                                          </div>
                                                             
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="phone_office" class="col-md-1 control-label">@lang('company.phone') :</label>
                        
                                                    <div class="col-md-3">
                                                        <input id="phone_office" type="text" class="form-control" name="phone_office" required>
                                                    </div>

                                                    <label for="phone" class="col-md-1 control-label">@lang('company.mobile') :</label>
                        
                                                    <div class="col-md-3">
                                                        <input id="phone" type="text" class="form-control" name="phone" required>
                                                    </div>

                                                    <label for="website" class="col-md-1 control-label">@lang('company.website') :</label>
                        
                                                    <div class="col-md-3">
                                                    <input id="website" type="text" class="form-control" name="website" required>
                                                    </div>
                                                </div>
                                              
                        
                                                <div class="form-group pull-right">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            @lang('logs.save')
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                        
                        
                                @endif
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
