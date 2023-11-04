{{ include('header.php', {title: 'Liste voyages'}) }}
<main>
    <h1>Voyages</h1>
    <table>
            <tr>
                <th>Destination</th>
                <th>Date de départ</th>
                <th>Date de retour</th>
                <th>Prix (en $)</th>
                <th>Description</th>
                <th>Supprimer</th>
            </tr>
            {% for voyage in voyages %}
                <tr>
                    <td><a href="{{ path }}voyage/show/{{ voyage.id }}">{{ voyage.destination }}</a></td>
                    <td>{{ voyage.date_depart }}</td>
                    <td>{{ voyage.date_retour }}</td>
                    <td>{{ voyage.prix }}</td>
                    <td>{{ voyage.description }}</td>
                    <td>
                        <form action="{{ path }}voyage/destroy" method="post" class="delete-form">
                            <input type="hidden" name="id" value="{{ voyage.id }}">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
            {% endfor %}
    </table>
    <a href="{{ path }}voyage/create">Ajouter</a>
</main>
</body>
</html>