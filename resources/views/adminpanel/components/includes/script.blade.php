{{-- <script src="{{ asset('adminpanel/assets/static/js/components/dark.js') }}"></script> --}}
<script src="{{ asset('adminpanel/assets/static/js/pages/horizontal-layout.js') }}"></script>
<script src="{{ asset('adminpanel/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

<script src="{{ asset('adminpanel/assets/compiled/js/app.js') }}"></script>

<script src="{{ asset('adminpanel/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('adminpanel/assets/static/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('adminpanel/assets/static/js/initTheme.js') }}"></script>

{{-- Jquery datatable --}}
{{-- <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script> --}}

<script src="{{ asset('adminpanel/assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminpanel/assets/static/js/pages/datatables.js') }}"></script>
<script src="{{ asset('adminpanel/assets/static/js/pages/datatables.min.js') }}"></script>
<script src="{{ asset('adminpanel/assets/extensions/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('adminpanel/assets/static/js/pages/parsley.js') }}"></script>

{{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>   --}}
<script>
    new DataTable('#mytable');
</script>

<script src="{{ asset('adminpanel/vendor/cleavejs/dist/cleave.min.js') }}"></script>
<script src="{{ asset('adminpanel/vendor/cleavejs/dist/addons/cleave-phone.id.js') }}"></script>

<script>
    // Pastikan untuk menjalankan script setelah DOM selesai dimuat
    document.addEventListener("DOMContentLoaded", function() {
        // Dapatkan semua elemen form dengan class 'rupiah'
        var rupiahForms = document.querySelectorAll('.rupiah');

        // Iterasi melalui setiap elemen dan terapkan script Cleave.js
        rupiahForms.forEach(function(element) {
            var cleave = new Cleave(element, {
                numeral: true,
                prefix: 'Rp ',
                numeralIntegerScale: 10,
                numeralThousandsGroupStyle: 'thousand',
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectElements = document.querySelectorAll('.choices');
        selectElements.forEach(function(selectElement) {
            new Choices(selectElement, {
                searchEnabled: true,
                placeholder: true,
                placeholderValue: 'Pilih opsi',
            });
        });
    });
</script>

<script src="{{ asset('adminpanel/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('adminpanel/assets/static/js/pages/form-element-select.js') }}"></script>
