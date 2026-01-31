# Foodtastic - Application Web E-commerce

Bienvenue sur le projet **Foodtastic**, une application web moderne de e-commerce pour la vente de produits frais et locaux (vins, fruits, légumes, miel, etc.). Ce projet a été modernisé pour offrir une architecture propre, une interface utilisateur premium et une gestion simplifiée via Docker.

## 🚀 Fonctionnalités Clés

*   **Catalogue Produits** : Navigation par catégories (Vins, Fruits, Légumes, etc.).
*   **Panier d'Achat** : Gestion complète du panier (ajout, modification, suppression).
*   **Espace Membre** : Inscription et Connexion sécurisées.
*   **Paiement & Facturation** : Simulation de commande et génération de factures PDF professionnelles.
*   **Interface Moderne** : Design « Premium » responsive avec animations et mode sombre (partiel).
*   **Architecture MVC-like** : Séparation claire entre la logique (Models), l'affichage (Views) et la configuration.

---

## 🛠 Prérequis

Pour exécuter ce projet, vous avez besoin de :

1.  **Docker Desktop** (pour la base de données).
2.  **PHP 8.2+** (installé localement sur votre machine).
3.  **Terminal** (Mac/Linux ou PowerShell sur Windows).

---

## ⚙️ Installation et Lancement

Suivez ces étapes pour lancer le projet en quelques minutes.

### 1. Démarrer la Base de Données

Nous utilisons **Docker** pour lancer un serveur MariaDB et PhpMyAdmin sans configuration complexe.

1.  Ouvrez votre terminal à la racine du projet.
2.  Lancez les conteneurs :

```bash
docker-compose up -d
```

*   Une base de données nommée `foodtasticbdd` sera créée automatiquement.
*   Gérez votre base de données via **PhpMyAdmin** à l'adresse : [http://localhost:8080](http://localhost:8080) (User: `root`, Pass: `root`).

### 2. Lancer le Serveur Web PHP

Utilisez le serveur de développement intégré à PHP pour servir l'application.

```bash
php -S localhost:8000 -t src
```

*   L'option `-t src` indique que le dossier racine du site web est le dossier `src/`.

### 3. Accéder à l'Application

Ouvrez votre navigateur et rendez-vous sur :

👉 **[http://localhost:8000](http://localhost:8000)**

---

## 🗂 Structure du Projet

```text
foodtasticwebapp/
├── docker-compose.yml       # Configuration Docker (Base de données)
├── README.md                # Documentation du projet
└── src/                     # Code source de l'application
    ├── bddconnect/          # Connexion à la BDD (PDO)
    ├── css/                 # Feuilles de styles (Premium CSS)
    ├── foodtasticbdd/       # Script SQL d'initialisation
    ├── html2pdf/            # Librairie pour génération PDF
    ├── images-produits/     # (Obsolète - voir uploads)
    ├── includes/            # Composants réutilisables
    │   ├── auth.php         # Logique d'authentification
    │   ├── config.php       # Configuration globale
    │   ├── header.php       # En-tête HTML
    │   ├── footer.php       # Pied de page HTML
    │   └── nav.php          # Barre de navigation
    ├── models/              # Classes PHP (Produit, ImageProduit)
    ├── uploads/             # Images des produits
    ├── usermanagement/      # Gestion profil utilisateur
    ├── index.php            # Page d'accueil
    ├── produits.php         # Page boutique globale
    ├── panier.php           # Page panier
    ├── paiement.php         # Page de paiement
    ├── facture.php          # Génération de facture PDF
    └── ... (pages catégories)
```

---

## 🔧 Dépannage Courant

**Erreur de connexion à la Base de Données ?**
*   Vérifiez que Docker tourne bien : `docker ps`
*   Assurez-vous que le fichier `src/bddconnect/bdd.php` pointe bien vers `127.0.0.1` (et non localhost) si vous avez des erreurs de socket.
*   Credentials par défaut : `root` / `root`.

**Images manquantes ou liens cassés ?**
*   Le serveur PHP doit bien être lancé avec `-t src` pour définir la racine correctement.
*   Vérifiez `src/includes/config.php` : la constante `BASE_URL` doit être `/`.

---

## 📝 Auteur

Projet modernisé et refactoré avec l'assistance d'une IA Agentique (Google DeepMind).
