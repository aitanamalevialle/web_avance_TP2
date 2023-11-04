{{ include('header.php', {title: 'Liste factures'}) }}
    <main>
        <h1>Factures</h1>
        <table>
            <tr>
                <th>Montant (en $)</th>
                <th>Date de facturation</th>
                <th>Voyage</th>
                <th>Client</th>
                <th>Supprimer</th>
            </tr>
            {% for facture in factures %}
                <tr>
                    <td><a href="{{path}}facture/show/{{ facture.id}}">{{ facture.montant }}</a></td>
                    <td>{{ facture.date_facture }}</td>
                    <td>{{ facture.voyage.destination }}</td>
                    <td>{{ facture.client.nom }}</td>
                    <td>
                        <form action="{{ path }}facture/destroy" method="post" class="delete-form">
                            <input type="hidden" name="id" value="{{ facture.id }}">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
            {% endfor %}
        </table>
        <a href="{{path}}facture/create">Ajouter</a>
    </main>
</body>
</html>