@props(['icon', 'color' => '#000000'])

@if ($icon === 'down-arrow')
    <svg {{ $attributes(['class' => 'transform -rotate-90']) }} width="22" height="22" viewBox="0 0 22 22">
        <g fill="none" fill-rule="evenodd">
            <path stroke="{{ $color }}" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
            </path>
            <path fill="{{ $color }}" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
            </path>
        </g>
    </svg>
@endif

@if ($icon === 'cancel')
    <svg {{ $attributes(['class']) }} width="800px" height="800px" viewBox="0 0 512 512" version="1.1" <g
        id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="work-case" fill="{{ $color }}" transform="translate(91.520000, 91.520000)">
            <polygon id="Close"
                points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48">
            </polygon>
        </g>
        </g>
    </svg>
@endif

@if ($icon === 'trashcan')
    <svg {{ $attributes(['class']) }} fill="{{ $color }}" width="800px" height="800px" viewBox="0 0 36 36" version="1.1"
        preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>trash-line</title>
        <path class="clr-i-outline clr-i-outline-path-1"
            d="M27.14,34H8.86A2.93,2.93,0,0,1,6,31V11.23H8V31a.93.93,0,0,0,.86,1H27.14A.93.93,0,0,0,28,31V11.23h2V31A2.93,2.93,0,0,1,27.14,34Z">
        </path>
        <path class="clr-i-outline clr-i-outline-path-2" d="M30.78,9H5A1,1,0,0,1,5,7H30.78a1,1,0,0,1,0,2Z"></path>
        <rect class="clr-i-outline clr-i-outline-path-3" x="21" y="13" width="2" height="15"></rect>
        <rect class="clr-i-outline clr-i-outline-path-4" x="13" y="13" width="2" height="15"></rect>
        <path class="clr-i-outline clr-i-outline-path-5"
            d="M23,5.86H21.1V4H14.9V5.86H13V4a2,2,0,0,1,1.9-2h6.2A2,2,0,0,1,23,4Z"></path>
        <rect x="0" y="0" width="36" height="36" fill-opacity="0" />
    </svg>
@endif
