<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('master.company'); ?></strong>
        </span>
    </nav>
    
    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-menu-right-icon icmn-cog"></span>
                <span class="cui-utils-title">
                    <?php echo app('translator')->getFromJson('master.company'); ?>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                            
                                <?php if(!empty($company[0]->id)): ?>
                                    <form action="<?php echo e(route( 'company.update',$company[0]->id)); ?>" method="post" class="form-horizontal">
                                <?php echo e(method_field('PUT')); ?>

                                <?php echo csrf_field(); ?>

                                <div class="form-group row">
                                                        
                                                        <label for="type_business" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.typecompany'); ?></label>
                            
                                                        <div class="col-md-5">
                                                           
                                                            <select id="type_business" class="form-control" name="type_business" required>
                                                               
                                                          
                         <option value='0' <?php echo $company[0]->type_business == 0 ? 'selected' : ''; ?>> -- <?php echo app('translator')->getFromJson('logs.select'); ?> --</option> 
                         <option value='1' <?php echo $company[0]->type_business == 1 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.advertising'); ?></option> 
                         <option value='2' <?php echo $company[0]->type_business == 2 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.automotive'); ?></option> 
                         <option value='3'<?php echo $company[0]->type_business == 3 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.chemical-plastic'); ?></option> 
                         <option value='4'<?php echo $company[0]->type_business == 4 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.construction-construction-materials'); ?></option> 
                         <option value='5'<?php echo $company[0]->type_business == 5 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.design-decorate'); ?></option> 
                         <option value='6'<?php echo $company[0]->type_business == 6 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.energy'); ?></option> 
                         <option value='7'<?php echo $company[0]->type_business == 7 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.financial-institution-loans-credit-cards'); ?></option> 
                         <option value='8'<?php echo $company[0]->type_business == 8 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.clothing-textile'); ?></option> 
                         <option value='9'<?php echo $company[0]->type_business == 9 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.hospital-medical'); ?></option> 
                         <option value='10'<?php echo $company[0]->type_business == 10 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.import-export'); ?></option> 
                         <option value='11'<?php echo $company[0]->type_business == 11 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.jewelry-gemstones'); ?></option> 
                         <option value='12'<?php echo $company[0]->type_business == 12 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.packaging'); ?></option> 
                        <option value='13'<?php echo $company[0]->type_business == 13 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.publishing'); ?></option> 
                          <option value='14'<?php echo $company[0]->type_business == 14 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.recruitment'); ?></option> 
                          <option value='15'<?php echo $company[0]->type_business == 15 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.service'); ?></option> 
                         <option value='16'<?php echo $company[0]->type_business == 16 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.transportation'); ?></option> 
                          <option value='17'<?php echo $company[0]->type_business == 17 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.department-store'); ?></option> 
                          <option value='18'<?php echo $company[0]->type_business == 18 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.metal-steel-industry'); ?></option> 
                          <option value='19'<?php echo $company[0]->type_business == 19 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.mass-media'); ?></option> 
                          <option value='20'<?php echo $company[0]->type_business == 20 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.agribusiness'); ?></option> 
                          <option value='21'<?php echo $company[0]->type_business == 21 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.banking'); ?></option> 
                         <option value='22'<?php echo $company[0]->type_business == 22 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.computer'); ?></option> 
                          <option value='23'<?php echo $company[0]->type_business == 23 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.advisor'); ?></option> 
                          <option value='24'<?php echo $company[0]->type_business == 24 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.education'); ?></option> 
                          <option value='25'<?php echo $company[0]->type_business == 25 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.electronic-industry'); ?></option> 
                          <option value='26'<?php echo $company[0]->type_business == 26 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.entertainment'); ?></option> 
                         <option value='27'<?php echo $company[0]->type_business == 27 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.food-beverage'); ?></option> 
                          <option value='28'<?php echo $company[0]->type_business == 28 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.civil-enterprise-foundation-organization'); ?></option> 
                          <option value='29'<?php echo $company[0]->type_business == 29 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.hotel-resort'); ?></option> 
                          <option value='30'<?php echo $company[0]->type_business == 30 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.life-insurance'); ?></option> 
                          <option value='31'<?php echo $company[0]->type_business == 31 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.pharmaceutical-cosmetic'); ?></option> 
                          <option value='32'<?php echo $company[0]->type_business == 32 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.stationery-paper'); ?></option> 
                         <option value='33'<?php echo $company[0]->type_business == 33 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.real-estate'); ?></option> 
                         <option value='34'<?php echo $company[0]->type_business == 34 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.retail'); ?></option> 
                         <option value='35'<?php echo $company[0]->type_business == 35 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.communication-and-telecommunication'); ?></option> 
                         <option value='36'<?php echo $company[0]->type_business == 36 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.tourism'); ?></option> 
                         <option value='37'<?php echo $company[0]->type_business == 37 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.law'); ?></option> 
                         <option value='38'<?php echo $company[0]->type_business == 38 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.wood-furniture-appliances'); ?></option> 
                         <option value='39'<?php echo $company[0]->type_business == 39 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.direct-sales'); ?></option> 
                         <option value='40'<?php echo $company[0]->type_business == 40 ? 'selected' : ''; ?>><?php echo app('translator')->getFromJson('company.other'); ?></option> 
                        
                                                      
                                                                
                                                             
                                                                </select>
                                                        </div>

                                                        <label for="vat" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.taxid'); ?> :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="vat" type="text" value="<?php echo $company[0]->vat; ?>" class="form-control" name="vat" required>
                                                    </div>
                                                    </div>
                        
                        
                                                    <div class="form-group row">
                                                    <label for="name_business_th"  class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.nameth'); ?> :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="name_business_th" value="<?php echo $company[0]->name_business_th; ?>" type="text" class="form-control" name="name_business_th" required>
                                                    </div>

                                                    <label for="name_business_eng" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.nameen'); ?> :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="name_business_eng" value="<?php echo $company[0]->name_business_eng; ?>" type="text" class="form-control" name="name_business_eng" required>
                                                    </div>
                                                </div>
                        
                        
                                                <div class="form-group row">
                                                    <label for="address_company" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.address'); ?> :</label>
                        
                                                    <div class="col-md-5">
                                                        <textarea id="address_company" type="text" class="form-control" name="address_company" required><?php echo $company[0]->address_company; ?></textarea>
                                                    </div>

                                                    <label for="size" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.office'); ?> : :</label>
                        
                                                    <div class="col-md-5">
                                                      
                                                            <div class="btn-group" data-toggle="buttons">
                                                                    <label class="btn <?php if($company[0]->size == 2): ?> btn-outline-primary <?php else: ?> btn-primary <?php endif; ?>">
                                                                      <input type="radio" name="size" value="1" <?php if($company[0]->size == 1): ?> checked <?php endif; ?>/>
                                                                      <?php echo app('translator')->getFromJson('company.small'); ?>
                                                                    </label>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <label class="btn <?php if($company[0]->size != 2): ?> btn-outline-primary <?php else: ?> btn-primary <?php endif; ?>">
                                                                      <input type="radio" name="size" value="2"  <?php if($company[0]->size == 2): ?> checked <?php endif; ?>/>
                                                                      <?php echo app('translator')->getFromJson('company.big'); ?>
                                                                    </label>
                                                                  </div>
                        
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="phone_office" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.phone'); ?> :</label>
                        
                                                    <div class="col-md-3">
                                                        <input id="phone_office" value="<?php echo $company[0]->phone_office; ?>" type="text" class="form-control" name="phone_office" required>
                                                    </div>

                                                    <label for="phone" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.mobile'); ?> :</label>
                        
                                                    <div class="col-md-3">
                                                        <input id="phone" value="<?php echo $company[0]->phone; ?>" type="text" class="form-control" name="phone" required>
                                                    </div>

                                                    <label for="website" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.website'); ?> :</label>
                        
                                                    <div class="col-md-3">
                                                    <input id="website" value="<?php echo $company[0]->website; ?>" type="text" class="form-control" name="website" required>
                                                    </div>
                                                </div>
                        
                        
                                                <div class="form-group pull-right">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            <?php echo app('translator')->getFromJson('logs.save'); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                        
                        
                                <?php else: ?>
                            <form action="<?php echo route('company.store'); ?>" method="post" class="form-horizontal">
                                <?php echo csrf_field(); ?>

                        
                                <div class="form-group row">
                                                        
                                                        <label for="type_business" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.typecompany'); ?> :</label>
                            
                                                        <div class="col-md-5">
                                                           
                                                            <select id="type_business" class="form-control" name="type_business" required>
                                                                                <option value='0'> -- <?php echo app('translator')->getFromJson('logs.select'); ?> --</option>
                                                                                <option value='1' ><?php echo app('translator')->getFromJson('company.advertising'); ?></option>
                                                                <option value='2' ><?php echo app('translator')->getFromJson('company.automotive'); ?></option> 
                                                                <option value='3' ><?php echo app('translator')->getFromJson('company.chemical-plastic'); ?></option> 
                                                                <option value='4' ><?php echo app('translator')->getFromJson('company.construction-construction-materials'); ?></option> 
                                                                <option value='5' ><?php echo app('translator')->getFromJson('company.design-decorate'); ?></option> 
                                                                <option value='6' ><?php echo app('translator')->getFromJson('company.energy'); ?></option> 
                                                                <option value='7' ><?php echo app('translator')->getFromJson('company.financial-institution-loans-credit-cards'); ?></option> 
                                                                <option value='8' ><?php echo app('translator')->getFromJson('company.clothing-textile'); ?></option> 
                                                                <option value='9' ><?php echo app('translator')->getFromJson('company.hospital-medical'); ?></option> 
                        
                        
                                                                <option value='10' ><?php echo app('translator')->getFromJson('company.import-export'); ?></option> 
                                                                <option value='11' ><?php echo app('translator')->getFromJson('company.jewelry-gemstones'); ?></option> 
                                                                <option value='12' ><?php echo app('translator')->getFromJson('company.packaging'); ?></option> 
                                                                <option value='13' ><?php echo app('translator')->getFromJson('company.publishing'); ?></option> 
                                                                <option value='14' ><?php echo app('translator')->getFromJson('company.recruitment'); ?></option> 
                                                                <option value='15' ><?php echo app('translator')->getFromJson('company.service'); ?></option> 
                                                                <option value='16' ><?php echo app('translator')->getFromJson('company.transportation'); ?></option> 
                                                                <option value='17' ><?php echo app('translator')->getFromJson('company.department-store'); ?></option> 
                                                                <option value='18' ><?php echo app('translator')->getFromJson('company.metal-steel-industry'); ?></option> 
                                                                <option value='19' ><?php echo app('translator')->getFromJson('company.mass-media'); ?></option> 
                        
                        
                                                                <option value='20' ><?php echo app('translator')->getFromJson('company.agribusiness'); ?></option> 
                                                                <option value='21' ><?php echo app('translator')->getFromJson('company.banking'); ?></option> 
                                                                <option value='22' ><?php echo app('translator')->getFromJson('company.computer'); ?></option> 
                                                                <option value='23' ><?php echo app('translator')->getFromJson('company.advisor'); ?></option> 
                                                                <option value='24' ><?php echo app('translator')->getFromJson('company.education'); ?></option> 
                                                                <option value='25' ><?php echo app('translator')->getFromJson('company.electronic-industry'); ?></option> 
                                                                <option value='26' ><?php echo app('translator')->getFromJson('company.entertainment'); ?></option> 
                                                                <option value='27' ><?php echo app('translator')->getFromJson('company.food-beverage'); ?></option> 
                                                                <option value='28' ><?php echo app('translator')->getFromJson('company.civil-enterprise-foundation-organization'); ?></option> 
                                                                <option value='29' ><?php echo app('translator')->getFromJson('company.hotel-resort'); ?></option> 
                                                              
                                                                <option value='30' ><?php echo app('translator')->getFromJson('company.life-insurance'); ?></option> 
                                                                <option value='31' ><?php echo app('translator')->getFromJson('company.pharmaceutical-cosmetic'); ?></option> 
                                                                <option value='32' ><?php echo app('translator')->getFromJson('company.stationery-paper'); ?></option> 
                                                                <option value='33' ><?php echo app('translator')->getFromJson('company.real-estate'); ?></option> 
                                                                <option value='34' ><?php echo app('translator')->getFromJson('company.retail'); ?></option> 
                        
                        
                        
                                                                <option value='35' ><?php echo app('translator')->getFromJson('company.communication-and-telecommunication'); ?></option> 
                                                                <option value='36' ><?php echo app('translator')->getFromJson('company.tourism'); ?></option> 
                        
                                                                <option value='37' ><?php echo app('translator')->getFromJson('company.law'); ?></option> 
                        
                                                                <option value='38' ><?php echo app('translator')->getFromJson('company.wood-furniture-appliances'); ?></option> 
                                                                <option value='39' ><?php echo app('translator')->getFromJson('company.direct-sales'); ?></option> 
                        
                                                                <option value='40' ><?php echo app('translator')->getFromJson('company.other'); ?></option> 
                                                                
                                                                
                                                                </select>
                                                        </div>
                                                        <label for="vat" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.taxid'); ?> :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="vat" type="text" class="form-control" name="vat" required>
                                                    </div>
                                                    </div>
                        
                        
                                                    <div class="form-group row">
                                                    <label for="name_business_th" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.nameth'); ?></label>
                        
                                                    <div class="col-md-5">
                                                        <input id="name_business_th" type="text" class="form-control" name="name_business_th" required>
                                                    </div>

                                                    <label for="name_business_eng" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.nameen'); ?> :</label>
                        
                                                    <div class="col-md-5">
                                                        <input id="name_business_eng" type="text" class="form-control" name="name_business_eng" required>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="address_company" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.address'); ?> :</label>
                        
                                                    <div class="col-md-5">
                                                        <textarea id="address_company" type="text" class="form-control" name="address_company" required></textarea>
                                                    </div>

                                                    <label for="size" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.office'); ?> :</label>
                        
                                                    <div class="col-md-5">
                                                    <div class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-outline-primary">
                                                              <input type="radio" name="size" value="1"/>
                                                              <?php echo app('translator')->getFromJson('company.small'); ?>
                                                            </label>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <label class="btn btn-outline-primary">
                                                              <input type="radio" name="size" value="2"/>
                                                              <?php echo app('translator')->getFromJson('company.big'); ?>
                                                            </label>
                                                          </div>
                                                             
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="phone_office" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.phone'); ?> :</label>
                        
                                                    <div class="col-md-3">
                                                        <input id="phone_office" type="text" class="form-control" name="phone_office" required>
                                                    </div>

                                                    <label for="phone" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.mobile'); ?> :</label>
                        
                                                    <div class="col-md-3">
                                                        <input id="phone" type="text" class="form-control" name="phone" required>
                                                    </div>

                                                    <label for="website" class="col-md-1 control-label"><?php echo app('translator')->getFromJson('company.website'); ?> :</label>
                        
                                                    <div class="col-md-3">
                                                    <input id="website" type="text" class="form-control" name="website" required>
                                                    </div>
                                                </div>
                                              
                        
                                                <div class="form-group pull-right">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            <?php echo app('translator')->getFromJson('logs.save'); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                        
                        
                                <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/company/index.blade.php ENDPATH**/ ?>