
    <div class="modal fade" id="msgModal" 
        tabindex="-1" role="dialog" 
        aria-labelledby="msgModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="msgModalLabel">{{ Session::get('msg_return') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    @if(!empty(Session::get('msg_return')))
    <script>
        $(function() { $('#msgModal').modal('show'); });
    </script>

    {{ Session::forget('msg_return') }}
    @endif

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('vendor/vendor_admin/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/vendor/holder.min.js') }}"></script>
<script>
    Holder.addTheme('thumb', {
    bg: '#55595c',
    fg: '#eceeef',
    text: 'Thumbnail'
    });
</script>



<!-- Custom scripts for all pages-->
<script src="{{ asset('js/js_admin/sb-admin-2.min.js') }}"></script>