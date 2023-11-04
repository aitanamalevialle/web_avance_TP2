{{ include('header.php', {title: 'Modification facture'}) }}
<main>
    <form action="{{path}}facture/update" method="post">
        <input type="hidden" name="id" value="{{ facture.id }}">
        <label for="montant">Montant (en $) : </label>
        <input type="number" id="montant" name="montant" value="{{ facture.montant }}" required>
        <label for="date_facture">Date de facturation : </label>
        <input type="date" id="date_facture" name="date_facture" value="{{ facture.date_facture }}" required>
        <label>Voyage : </label>
        <select name="voyage_id">
            {% for voyage in voyages %}
                <option value="{{ voyage.id }}" {% if voyage.id == facture.voyage_id %} selected {% endif %}>
                    {{ voyage.destination }}
                </option>
            {% endfor %}
        </select>
        <label>Client : </label>
        <select name="client_id">
            {% for client in clients %}
                <option value="{{ client.id }}" {% if client.id == facture.client_id %} selected {% endif %}>
                    {{ client.nom }}
                </option>
            {% endfor %}
        </select>
        <input type="submit" value="Sauvegarder">
    </form>
</main>