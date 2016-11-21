@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <form id="eventForm" method="post" class="form-horizontal">


          <div class="form-group">
              <label class="col-xs-3 control-label">From Date</label>
              <div class="col-xs-5 date">
                  <div class="input-group input-append date" id="datePicker">
                      <input type="text" class="form-control" name="date" />
                      <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <label class="col-xs-3 control-label">To Date</label>
              <div class="col-xs-5 date">
                  <div class="input-group input-append date" id="datePicker">
                      <input type="text" class="form-control" name="date" />
                      <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
              </div>
          </div>

</form>

<script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>

      </div>
    </div>
</div>
@endsection
