@props(['logo'=>''])

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-8 pb-40">
    <div>
        {{ $logo }}
    </div>
        {{ $slot }}
</div>
