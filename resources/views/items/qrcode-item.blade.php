<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("QR Code de l'item") }} 
            
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Voici le QR code menant à cette item (Power by <a target="_blank" class="underline" href=" https://quickchart.io/documentation/qr-codes/">quickchart.io</a>)
        </p>
        <img src="https://quickchart.io/qr?text={{ config('app.url') }}/items/{{$item->id}} " alt="">
        <div class="mt-5">
            <a id="copyButton"><x-primary-button>{{ __('Copier lien') }}</x-primary-button></a>
        </div>
    </header>
</section>
<script>
        // JavaScript pour copier l'URL
        document.getElementById('copyButton').addEventListener('click', function() {
            // Obtenez l'URL actuelle
            const url = window.location.href;

            // Créez un élément temporaire pour contenir l'URL
            const tempInput = document.createElement('input');
            tempInput.value = url;
            document.body.appendChild(tempInput);

            // Sélectionnez le contenu de l'élément temporaire
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Pour les appareils mobiles

            // Copiez le texte sélectionné dans le presse-papiers
            document.execCommand('copy');

            // Supprimez l'élément temporaire
            document.body.removeChild(tempInput);
        });
    </script>