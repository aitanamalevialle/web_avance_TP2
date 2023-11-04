{{ include('header.php', {title: 'Ajout facture'}) }}
    <main>
        <form action="{{path}}facture/store" method="post">
            <label for="montant">Montant (en $) : </label>
            <input type="number" id="montant" name="montant" required>
            <label for="date_facture">Date de facturation : </label>
            <input type="date" id="date_facture" name="date_facture" required>
            <label>Voyage : 
                <select name="voyage_id">
                    <option value="">Sélectionner un voyage</option>
                   {%  for voyage in voyages %}
                        <option value="{{ voyage.id}}">{{ voyage.destination }}</option>
                    {% endfor %}
                </select>
            </label>
            <label>Client : 
                <select name="client_id">
                    <option value="">Sélectionner un client</option>
                   {%  for client in clients %}
                        <option value="{{ client.id}}">{{ client.nom }}</option>
                    {% endfor %}
                </select>
            </label>
            <input type="submit" value="Ajouter">
        </form>
    </main>
</body>
</html>