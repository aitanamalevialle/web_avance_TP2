{{ include('header.php', {title: 'Détails voyage'}) }}
        <main>
                <div class="show-container">
                <h2>Voyage</h2>
                        <p><strong>Destination : </strong>{{ voyage.destination }}</p>
                        <p><strong>Date de départ : </strong>{{ voyage.date_depart }}</p>
                        <p><strong>Date de retour : </strong>{{ voyage.date_retour }}</p>
                        <p><strong>Prix (en $) : </strong>{{ voyage.prix }}</p>
                        <p><strong>Description : </strong>{{ voyage.description }}</p>
                        <a href="{{path}}voyage/edit/{{ voyage.id }}">Modifier</a>  
                </div>
        </main>
</body>
</html>