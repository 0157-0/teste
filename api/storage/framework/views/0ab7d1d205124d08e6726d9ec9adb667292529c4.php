<?php $__env->startSection('title', 'Ride Confirmation '); ?>

<?php $__env->startSection('styles'); ?>
<style type="text/css">
    .surge-block{
        background-color: black;
        width: 50px;
        height: 50px;
        border-radius: 25px;
        margin: 0 auto;
        padding: 10px;
        padding-top: 15px;
    }
    .surge-text{
        top: 11px;
        font-weight: bold;
        color: white;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-9">
    <div class="dash-content">
        <div class="row no-margin">
            <div class="col-md-12">
                <h4 class="page-title"><?php echo app('translator')->getFromJson('user.ride.ride_now'); ?></h4>
            </div>
        </div>
        <?php echo $__env->make('common.notify', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row no-margin">
            <div class="col-md-6">
                <form action="<?php echo e(url('create/ride')); ?>" method="POST" id="create_ride">

                <?php echo e(csrf_field()); ?>

                    <dl class="dl-horizontal left-right">
                        <dt><?php echo app('translator')->getFromJson('user.type'); ?></dt>
                        <dd><?php echo e($service->name); ?></dd>
                        <dt><?php echo app('translator')->getFromJson('user.total_distance'); ?></dt>
                        <dd><?php echo e(distance($fare->distance)); ?></dd>
                        <dt><?php echo app('translator')->getFromJson('user.eta'); ?></dt>
                        <dd><?php echo e($fare->time); ?></dd>
                        <dt><?php echo app('translator')->getFromJson('user.estimated_fare'); ?></dt>
                        <dd><?php echo e(currency($fare->estimated_fare)); ?></dd>
                        <dt><?php echo app('translator')->getFromJson('user.promocode'); ?></dt>
                        <dd id="promo_amount"><?php echo e(currency()); ?></dd>
                        <hr>
                        <dt><?php echo app('translator')->getFromJson('user.total'); ?></dt>
                        <dd id="total_amount"><?php echo e(currency($fare->estimated_fare - 0)); ?></dd>
                        <hr>
                        <?php if(Auth::user()->wallet_balance > 0): ?>

                        <input type="checkbox" name="use_wallet" value="1"><span style="padding-left: 15px;"><?php echo app('translator')->getFromJson('user.use_wallet_balance'); ?></span>
                        <br>
                        <br>
                            <dt><?php echo app('translator')->getFromJson('user.available_wallet_balance'); ?></dt>
                            <dd><?php echo e(currency(Auth::user()->wallet_balance)); ?></dd>
                        <?php endif; ?>
                    </dl>
                    
                    <?php if(Config::get('constants.braintree') == 1): ?>
                    <input type="hidden" name="braintree_nonce" value="" />
                    <?php endif; ?>
                    <input type="hidden" name="s_address" value="<?php echo e(Request::get('s_address')); ?>">
                    <input type="hidden" name="d_address" value="<?php echo e(Request::get('d_address')); ?>">
                    <input type="hidden" name="s_latitude" value="<?php echo e(Request::get('s_latitude')); ?>">
                    <input type="hidden" name="s_longitude" value="<?php echo e(Request::get('s_longitude')); ?>">
                    <input type="hidden" name="d_latitude" value="<?php echo e(Request::get('d_latitude')); ?>">
                    <input type="hidden" name="d_longitude" value="<?php echo e(Request::get('d_longitude')); ?>">
                    <input type="hidden" name="service_type" value="<?php echo e(Request::get('service_type')); ?>">
                    <input type="hidden" name="distance" value="<?php echo e($fare->distance); ?>">
                    <?php if(Request::get('rental_hours') != ''): ?> 
                    <input type="hidden" name="rental_hours" value="<?php echo e(Request::get('rental_hours')); ?>">
                    <?php endif; ?>
                    <p><?php echo app('translator')->getFromJson('user.promocode'); ?></p>
                    <select class="form-control" name="promocode_id" id="promocode">
                     <option value="" data-percent="0" data-max="0"><?php echo app('translator')->getFromJson('user.promocode_select'); ?></option>
                    <?php $__currentLoopData = $promolist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($promo->id); ?>" data-percent = "<?php echo e($promo->percentage); ?>" data-max= "<?php echo e($promo->max_amount); ?>"><?php echo e($promo->promo_code); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <br>
                    <p><?php echo app('translator')->getFromJson('user.payment_method'); ?></p>
                    <select class="form-control" name="payment_mode" id="payment_mode" onchange="card(this.value);">
                      <?php if(Config::get('constants.cash') == 1): ?>
                        <option value="CASH">DINHEIRO</option>
                      <?php endif; ?>   
                      <?php if(Config::get('constants.card') == 1): ?>
                      <?php if($cards->count() > 0): ?>
                        <option value="CARD">CARTÃO</option>
                      <?php endif; ?>
                      <?php if(Config::get('constants.braintree') == 1): ?>
                      <option value="BRAINTREE">BRAINTREE</option>
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php if(Config::get('constants.payumoney') == 1): ?>
                      <option value="PAYUMONEY">PAYUMONEY</option>
                      <?php endif; ?>
                      <?php if(Config::get('constants.paypal') == 1): ?>
                      <option value="PAYPAL">PAYPAL</option>
                      <?php endif; ?>
                      <?php if(Config::get('constants.paypal_adaptive') == 1): ?>
                      <option value="PAYPAL-ADAPTIVE">PAYPAL-ADAPTIVE</option>
                      <?php endif; ?>
                      <?php if(Config::get('constants.paytm') == 1): ?>
                      <option value="PAYTM">PAYTM</option>
                      <?php endif; ?>
                    </select>
                    <br>

                    <?php if(Config::get('constants.card') == 1): ?>
                        <?php if($cards->count() > 0): ?>
                        <select class="form-control" name="card_id" style="display: none;" id="card_id">
                          <option value="">Select Card</option>
                          <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($card->card_id); ?>"><?php echo e($card->brand); ?> **** **** **** <?php echo e($card->last_four); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(Config::get('constants.braintree') == 1): ?>
                        <div style="display: none;" id="braintree">
                            <div id="dropin-container"></div>
                        </div>
                    <?php endif; ?>

                    <?php if($fare->surge == 1): ?>

                        <span><em><?php echo app('translator')->getFromJson('user.demand_node'); ?></em></span>
                        <div class="surge-block"><span class="surge-text"><?php echo e($fare->surge_value); ?></span>
                        </div>
                    
                    <?php endif; ?>

                    <button type="submit" id="submit-button" class="half-primary-btn fare-btn"><?php echo app('translator')->getFromJson('user.ride.ride_now'); ?></button>
                    <button type="button" class="half-secondary-btn fare-btn" data-toggle="modal" data-target="#schedule_modal"><?php echo app('translator')->getFromJson('user.schedule'); ?></button>

                </form>
            </div>

            <div class="col-md-6">
                <div class="user-request-map">

                    <div class="map-static" style="background-image: url(<?php echo e($staticmap); ?>);">
                    </div>
                    <div class="from-to row no-margin">
                        <div class="from">
                            <h5><?php echo app('translator')->getFromJson('user.from'); ?></h5>
                            <p><?php echo e($request->s_address); ?></p>
                        </div>
                        <div class="to">
                            <h5><?php echo app('translator')->getFromJson('user.to'); ?></h5>
                            <p><?php echo e($request->d_address); ?></p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

    </div>
</div>



<!-- Schedule Modal -->
<div id="schedule_modal" class="modal fade schedule-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('user.schedule_title'); ?></h4>
      </div>
      <form>
      <div class="modal-body">
        
        <label><?php echo app('translator')->getFromJson('user.schedule_date'); ?></label>
        <input value="<?php echo e(date('m/d/Y')); ?>" type="text" id="datepicker" placeholder="Date" name="schedule_date">
        <label><?php echo app('translator')->getFromJson('user.schedule_time'); ?></label>
        <input value="<?php echo e(date('H:i')); ?>" type="text" id="timepicker" placeholder="Time" name="schedule_time">

      </div>
      <div class="modal-footer">
        <button type="button" id="schedule_button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('user.schedule_ride'); ?></button>
      </div>

      </form>
    </div>

  </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

  <script>

    $(document).ready(function(e) {

          $.ajax({
            url: "https://maps.googleapis.com/maps/api/directions/json?origin=<?php echo e($request->s_latitude); ?>,<?php echo e($request->s_longitude); ?>&destination=<?php echo e($request->d_latitude); ?>,<?php echo e($request->d_longitude); ?>&mode=driving&key=<?php echo e(config('constants.map_key')); ?>", 
            type: "GET",   
            dataType: 'jsonp',
            cache: false,
            success: function(response){     
            alert("S");                     
                console.log(response.routes[0].overview_polyline.points);                
            }           
        });  
    });

  </script>

    <?php if(Config::get('constants.braintree') == 1): ?>
    <script src="https://js.braintreegateway.com/web/dropin/1.14.1/js/dropin.min.js"></script>

    <script>
        

        var button = document.querySelector('#submit-button');
        var form = document.querySelector('#create_ride');
        braintree.dropin.create({
          authorization: '<?php echo e($clientToken); ?>',
          container: '#dropin-container',
          //Here you can hide paypal
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          button.addEventListener('click', function (e) {
            e.preventDefault();
            if(document.querySelector('select[name="payment_mode"]').value == "BRAINTREE") {
              instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
                   document.querySelector('input[name="braintree_nonce"]').value = payload.nonce;
                   console.log(payload.nonce);
                   form.submit();
              });
            } else {
              form.submit();
            }
          });
        });
    </script>
    
    <?php endif; ?>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#schedule_button').click(function(){
                $("#datepicker").clone().attr('type','hidden').appendTo($('#create_ride'));
                $("#timepicker").clone().attr('type','hidden').appendTo($('#create_ride'));
                document.getElementById('create_ride').submit();
            });
        });
    </script>
    <script type="text/javascript">
        var date = new Date();        
        date.setDate(date.getDate());
        $('#datepicker').datepicker({  
            startDate: date
        });
        $('#timepicker').timepicker({showMeridian : false});
    </script>
    <script type="text/javascript">
        <?php if(Config::get('constants.cash') == 0): ?>
            card('CARD');
        <?php endif; ?>
        function card(value){
            $('#card_id, #braintree').fadeOut(300);
            if(value == 'CARD'){
                $('#card_id').fadeIn(300);
            }else if(value == 'BRAINTREE'){
                $('#braintree').fadeIn(300);
            }
        }
       
        $('#promocode').on('change', function() {
          
          var estimate = <?php echo e($fare->estimated_fare); ?>;
          var percentage = $('option:selected', this).attr('data-percent');
          var max_amount = $('option:selected', this).attr('data-max');
          var percent_total = estimate * percentage/100;
              if(percent_total > max_amount){
                promo = parseFloat(max_amount);
              }else{
                promo = parseFloat(percent_total);
              }
             $("#promo_amount").html("<?php echo e(config('constants.currency')); ?>"+promo.toFixed(2));
             $("#total_amount").html("<?php echo e(config('constants.currency')); ?>"+(estimate-promo).toFixed(2));
          });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>