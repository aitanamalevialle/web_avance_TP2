{{ include('header.php', {title: 'Ajout voyage'}) }}
    <main>
        <form action="{{path}}voyage/store" method="post">
            <label for="destination">Destination : </label>
            <input type="text" id="destination" name="destination" required>
            <label for="date depart">Date de départ : </label>
            <input type="date" id="date depart" name="date depart" required>
            <label for="date retour">Date de retour : </label>
            <input type="date" id="date retour" name="date retour" required>
            <label for="prix">Prix (en $) : </label>
            <input type="number" id="prix" name="prix" min="1000" required>
            <label for="description">Description : </label>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea>
            <input type="submit" value="Ajouter">
        </form>
    </main>
</body>
</html>