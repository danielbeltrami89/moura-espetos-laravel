<!-- ITENS ABAIXO DO FOOTER POREM O FOOTER ESTA DENTRO DA DIV WRAPPER-->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Esta saindo?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para finalizar essa sessão.</div>
            <div class="modal-footer">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <button class="btn btn-default" type="button" data-dismiss="modal">Fechar</button>
                    <button  class="btn btn-danger" type="submit" data-dismiss="modal" onclick="formSubmitLogoff()">Sair</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function formSubmitLogoff() {
        $("#logout-form").submit();
    }
</script>

<script type="text/javascript">
  
    // ------- Mascara para Valores R$ (Início) ------- 
    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() { 
            formatCurrency($(this), "blur");
        }
    });

    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }

    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.
        
        // get input value
        var input_val = input.val();
        
        // don't validate empty input
        if (input_val === "") { return; }
        
        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");
        
        // check for decimal
        if (input_val.indexOf(",") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(",");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);
        
        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }
        
        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = "R$ " + left_side + "," + right_side;

        } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = "R$ " + input_val;
        
        // final formatting
        if (blur === "blur") {
            input_val += ",00";
        }
        }
        
        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
    // ------- Mascara para Valores R$ (Fim) ------- 

    // ------- Mascara para CNPJ/CPF (Início) ------- 
    $("#cpfcnpj").keydown(function(){
        try {
            $("#cpfcnpj").unmask();
        } catch (e) {}

        var tamanho = $("#cpfcnpj").val().length;

        if(tamanho < 11){
            $("#cpfcnpj").mask("999.999.999-99");
        } else {
            $("#cpfcnpj").mask("99.999.999/9999-99");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function(){
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });
    // ------- Mascara para CNPJ/CPF (Fim) ------- 

</script>
<!-- Fim Logout Modal-->

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/vendor_admin/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/js_admin/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/vendor_admin/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/js_admin/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/js_admin/demo/chart-pie-demo.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/vendor_admin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/vendor_admin/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/js_admin/demo/datatables-demo.js') }}"></script>
