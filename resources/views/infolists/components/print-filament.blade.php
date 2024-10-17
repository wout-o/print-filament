<x-dynamic-component :component="$getEntryWrapperView()">
    <div>
        <button
            id="print-button"
            class="{{ implode(' ', config('print.button.classes')) }}">
            {{ $getLabel() }}
        </button>
    </div>
    <script>
        document.getElementById('print-button').addEventListener('click', function() {
            window.print();
        });
    </script>

    <style>
        @media print {
            body * {
                visibility: visible !important;
            }
            body {
                font-size: 12pt;
                color: #000;
            }
            .btn, #print-button, .fi-sidebar, .fi-breadcrumbs, .fi-topbar {
                display: none;
            }
        }
    </style>
</x-dynamic-component>
