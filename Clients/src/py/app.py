from flask import Flask, render_template, request, jsonify
import random
import nltk

app = Flask(__name__)

pairs = [
    [
        r"(salut|bonjour|coucou)",
        ["Bonjour! Bienvenue sur notre site de réservation d'hôtels. Comment puis-je vous aider aujourd'hui?",
         "Salut! Comment puis-je vous aider avec vos besoins de réservation d'hôtel?",
         "Bonjour! Comment puis-je vous aider avec vos réservations d'hôtel?"]
    ],
    [
        r"comment puis-je me connecter à mon compte?",
        ["Pour vous connecter à votre compte, cliquez sur le bouton 'Connexion' en haut à droite de la page et entrez votre nom d'utilisateur et votre mot de passe.",
         "Se connecter est facile! Cliquez simplement sur 'Connexion' en haut et fournissez vos identifiants.",
         "Vous pouvez vous connecter en cliquant sur le bouton 'Connexion' en haut à droite et en entrant votre nom d'utilisateur et votre mot de passe."]
    ],
    [
        r"comment puis-je créer un compte?",
        ["Créer un compte est facile! Cliquez simplement sur le bouton 'S'inscrire' en haut à droite de la page et remplissez vos informations.",
         "Pour créer un compte, cliquez sur 'S'inscrire' en haut à droite et entrez les informations requises.",
         "Cliquez sur le bouton 'S'inscrire' en haut à droite de la page et fournissez les détails nécessaires pour créer un compte."]
    ],
    [
        r"comment puis-je réserver une chambre?",
        ["Pour réserver une chambre, parcourez nos chambres disponibles, sélectionnez votre chambre préférée et cliquez sur le bouton 'Réserver maintenant'. Suivez les instructions pour finaliser votre réservation.",
         "Réserver une chambre est simple. Choisissez une chambre parmi nos annonces, cliquez sur 'Réserver maintenant' et suivez les étapes.",
         "Sélectionnez une chambre qui vous plaît, cliquez sur 'Réserver maintenant' et complétez le processus de réservation comme indiqué."]
    ],
    [
        r"puis-je annuler ma réservation?",
        ["Oui, vous pouvez annuler votre réservation. Connectez-vous à votre compte, allez dans 'Mes réservations', sélectionnez la réservation que vous souhaitez annuler et cliquez sur 'Annuler la réservation'.",
         "Pour annuler une réservation, connectez-vous à votre compte, allez dans 'Mes réservations' et cliquez sur 'Annuler' sur la réservation souhaitée.",
         "Connectez-vous et allez dans 'Mes réservations' pour annuler votre réservation. Sélectionnez simplement la réservation et cliquez sur 'Annuler la réservation'."]
    ],
    [
        r"comment puis-je contacter le service client?",
        ["Vous pouvez contacter notre service client en cliquant sur le lien 'Contactez-nous' en bas de la page. Vous pouvez également nous envoyer un e-mail à support@hotelbooking.com",
         "Pour le service client, cliquez sur 'Contactez-nous' en bas ou envoyez-nous un e-mail à support@hotelbooking.com.",
         "Contactez le service client en cliquant sur 'Contactez-nous' en bas de la page ou en envoyant un e-mail à support@hotelbooking.com."]
    ],
    [
        r"quitter",
        ["Au revoir! Si vous avez d'autres questions, n'hésitez pas à demander.",
         "Bye! Passez une bonne journée!",
         "À plus tard! Si vous avez d'autres questions, n'hésitez pas à demander."]
    ],
    [
        r"(.*)",
        ["Je suis désolé, je n'ai pas compris cela. Pouvez-vous reformuler s'il vous plaît?",
         "Pouvez-vous fournir plus de détails afin que je puisse mieux vous aider?",
         "Je ne suis pas sûr de comprendre. Pourriez-vous clarifier votre question?"]
    ]
]


def select_response(responses):
    return random.choice(responses)

def custom_chatbot_respond(message, pairs):
    for pattern, responses in pairs:
        if nltk.re.match(pattern, message):
            return select_response(responses)
    return "I'm sorry, I didn't understand that. Can you please rephrase?"

@app.route("/")
def index():
    return render_template("index.html")

@app.route("/chat", methods=["POST"])
def chat():
    user_input = request.json.get("message")
    response = custom_chatbot_respond(user_input, pairs)
    return jsonify({"response": response})

if __name__ == "__main__":
    app.run(debug=True, port=8080)


