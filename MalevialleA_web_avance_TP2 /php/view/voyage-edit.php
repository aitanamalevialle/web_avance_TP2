{{ include('header.php', {title: 'Modification voyage'}) }}
    <main>
        <form action="{{path}}voyage/update" method="post">
            <input type="hidden" name="id" value="{{ voyage.id }}">
            <label for="destination">Destination : </label>
            <input type="text" id="destination" name="destination" value="{{ voyage.destination }}" required>
            <label for="date_depart">Date de départ : </label>
            <input type="date" id="date_depart" name="date_depart" value="{{ voyage.date_depart }}" required>
            <label for="date_retour">Date de retour : </label>
            <input type="date" id="date_retour" name="date_retour" value="{{ voyage.date_retour }}" required>
            <label for="prix">Prix (en $) :</label>
            <input type="text" id="prix" name="prix" value="{{ voyage.prix }}" required>
            <label for="description">Description : </label>
            <textarea id="description" name="description" rows="4" cols="50" required>{{ voyage.description }}</textarea>
            <input type="submit" value="Sauvegarder">
        </form>
    </main>
</body>
</html>