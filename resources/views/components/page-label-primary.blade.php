
@php echo '<style>
         .wrapper {
                text-align: center;
            }

            .button {
                position: absolute;
                top: 50%;
            }
            </style>

        <div class="wrapper">

        <h5>';
@endphp

<span  class="badge bg-label-primary me-1">{{ $slot }}</span>

@php echo '</h5>';

         '</div>'
@endphp

