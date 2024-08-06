<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("QR Code de l'item") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Voici le QR code menant à cette item (Power by https://quickchart.io/documentation/qr-codes/).") }}
        </p>
        <img src="https://quickchart.io/qr?text={{ config('app.url') }}/items/{{$item->id}} " alt="">
       
    </header>
</section>
