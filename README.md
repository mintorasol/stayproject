# 🏢 Système de Réservation d'Appartements WordPress

Guide complet d'installation et de configuration pour votre site de location d'appartements à Casablanca.

---

## 📁 Structure des Fichiers

Vos fichiers ont été générés et organisés comme suit:

```
/theme-name/
├── functions.php                 (MODIFIER EXISTANT)
├── archive-apartment.php         (NOUVEAU FICHIER)
├── single-apartment.php          (NOUVEAU FICHIER)
├── css/
│   └── apartment-styles.css      (NOUVEAU FICHIER)
└── js/
    └── apartment-booking.js      (NOUVEAU FICHIER)
```

---

## 🚀 ÉTAPES D'INSTALLATION

### **ÉTAPE 1: Ajouter le code à functions.php**

1. Ouvrez votre themes folder dans WordPress (ex: `/wp-content/themes/votre-theme/`)
2. Ouvrez le fichier `functions.php`
3. **Copiez TOUT le contenu** du fichier `functions.php` généré
4. **Collez-le à la fin** de votre `functions.php` existant
5. Enregistrez le fichier

**⚠️ IMPORTANT:** Ne pas remplacer l'intégralité du fichier functions.php, mais ajouter le code à la fin!

---

### **ÉTAPE 2: Créer les fichiers de template**

1. Dans votre dossier de theme (`/wp-content/themes/votre-theme/`), créez deux fichiers:
   - `archive-apartment.php` → Collez le contenu d'archive-apartment.php
   - `single-apartment.php` → Collez le contenu de single-apartment.php

2. Sauvegardez ces fichiers

---

### **ÉTAPE 3: Créer les dossiers CSS et JS**

1. **Créez un dossier** nommé `css` dans votre theme: `/wp-content/themes/votre-theme/css/`
2. Placez le fichier `apartment-styles.css` dedans
3. **Créez un dossier** nommé `js` dans votre theme: `/wp-content/themes/votre-theme/js/`
4. Placez le fichier `apartment-booking.js` dedans

**Structure finale:**
```
/wp-content/themes/votre-theme/
├── css/
│   └── apartment-styles.css
├── js/
│   └── apartment-booking.js
├── archive-apartment.php
├── single-apartment.php
├── functions.php (modifié)
└── ... (autres fichiers)
```

---

## ✅ VÉRIFICATION À FAIRE APRÈS INSTALLATION

1. **Allez sur votre Dashboard WordPress**
2. **Vérifiez** que "Appartements" apparaît dans le menu de gauche
3. **Cliquez** sur "Ajouter un appartement"
4. **Confirmez** que tous les champs meta apparaissent:
   - ✓ Localisation
   - ✓ Prix par nuit
   - ✓ Nombre de personnes
   - ✓ Chambres
   - ✓ Lits
   - ✓ Salles de bain
   - ✓ Évaluation
   - ✓ Nombre d'avis
   - ✓ URL de référence

---

## 📝 AJOUTER VOS PREMIERS APPARTEMENTS

1. **WordPress Admin** → Appartements → Ajouter un appartement
2. Remplissez les champs:
   - **Titre**: ex "Appartement 2 Chambres Anfa"
   - **Description**: Détails du logement (éditeur WordPress)
   - **Image**: Cliquez "Définir l'image de la une"
   - **Localisation**: ex "Quartier Anfa, Casablanca"
   - **Prix par nuit**: ex "450" (en DH)
   - **Nombre de personnes**: ex "4"
   - **Chambres**: ex "2"
   - **Lits**: ex "2"
   - **Salles de bain**: ex "1,5"
   - **Évaluation**: ex "4.8"
   - **Nombre d'avis**: ex "42"
   - **URL de référence**: Laissez vide pour l'instant

3. **Cliquez "Publier"**

---

## 🎨 COULEURS & DESIGN

Le système utilise:
- **Couleur principale**: `#ff6a00` (Orange)
- **Police**: Poppins (chargée depuis Google Fonts)
- **Arrondis**: 12px sur la plupart des éléments
- **Ombres douces**: Pour le contraste

Pour **modifier la couleur orange**:
- Ouvrez `css/apartment-styles.css`
- Cherchez `--primary-color: #ff6a00;`
- Remplacez par votre couleur préférée

---

## 📱 PAGES GÉNÉRÉES

### **1. Archive (Liste des appartements)**
- **URL**: `/apartments/` ou `/appartements/`
- **Affichage**: Grille 3 colonnes (responsive)
- **Éléments**:
  - Image
  - Titre
  - Localisation
  - Prix par nuit
  - Évaluation
  - Bouton "Voir le logement"

### **2. Single (Page détails)**
- **URL**: `/apartments/nom-de-lappartement/`
- **Layout**: 2 colonnes
  
  **GAUCHE**:
  - Grande image
  - Titre
  - Localisation
  - Détails (chambres, lits, salles de bain, personnes)
  - Évaluation
  - Description complète

  **DROITE** (Carte sticky - reste visible au scroll):
  - Prix par nuit
  - Champ date d'arrivée
  - Champ date de départ
  - Champ nombre de personnes
  - **Calcul automatique des nuits**
  - **Calcul automatique du prix total**
  - Bouton "Réserver maintenant" (redirects à URL externe)

---

## 🔧 FONCTIONNALITÉS IMPLÉMENTÉES

### **1. Custom Post Type**
- ✓ Slug: `apartments`
- ✓ Public et avec archive
- ✓ Supports: titre, éditeur, image, champs personnalisés
- ✓ Visible dans l'API REST (pour développement futur)

### **2. Meta Fields (9 champs)**
- ✓ `_location` - Localisation
- ✓ `_price_per_night` - Prix par nuit
- ✓ `_rating` - Évaluation (0-5)
- ✓ `_reviews_count` - Nombre d'avis
- ✓ `_guests` - Nombre max de personnes
- ✓ `_bedrooms` - Chambres
- ✓ `_beds` - Lits
- ✓ `_baths` - Salles de bain
- ✓ `_airbnb_url` - URL externe

### **3. JavaScript - Calcul Automatique**
Le fichier `apartment-booking.js` gère:
- ✓ Validation des dates (départ > arrivée)
- ✓ Date minimale = aujourd'hui pour check-in
- ✓ Date minimale = jour après check-in pour check-out
- ✓ Calcul automatique du nombre de nuits
- ✓ Calcul automatique du prix total (nuits × prix/nuit)
- ✓ Validation nombre de personnes (max défini)
- ✓ Redirection vers URL externe au clic du bouton

### **4. Responsive Design**
- ✓ Desktop: Grille 3 colonnes
- ✓ Tablette: Grille 2 colonnes
- ✓ Mobile: 1 colonne
- ✓ Cartev sticky = fixed sur mobile

---

## 🎯 PROCHAINES ÉTAPES RECOMMANDÉES

1. **Ajouter vos 15 appartements** avec images et détails
2. **Tester le booking** (dates + calcul + redirection)
3. **Personnaliser les couleurs** si besoin
4. **Traduire** les strings si nécessaire (déjà en francais)
5. **Intégrer Stripe/PayPal** pour vrais paiements (optionnel)
6. **Ajouter Google Maps** pour localisation (optionnel)
7. **Setup emails de confirmation** (optionnel)

---

## 📞 AUTRES FONCTIONNALITÉS POSSIBLES

- ✨ Filtres (prix, chambres, évaluation)
- ✨ Formulaire de contact par appartement
- ✨ Système d'avis/commentaires
- ✨ Galerie d'images supplémentaires
- ✨ Calendrier de disponibilité
- ✨ Intégration Booking.com / Airbnb API
- ✨ Email de confirmation de réservation
- ✨ Dashboard client pour suivi réservations

---

## ⚙️ CONTRÔLE DE QUALITÉ

**Vérifiez que:**
- ✓ Le CPT "Appartements" apparaît en admin
- ✓ Les meta boxes s'affichent correctement
- ✓ La page d'archive affiche les cards correctement
- ✓ Les images responsive s'affichent bien
- ✓ La page single charge sans erreurs
- ✓ Le calcul du prix fonctionne
- ✓ Le bouton redirige bien
- ✓ C'est responsive sur mobile

---

## 🐛 DÉPANNAGE COURANT

**Q: Je ne vois pas "Appartements" en admin?**
A: Videz le cache WordPress ou réactivez le theme

**Q: Les images ne s'affichent pas?**
A: Assurez-vous d'avoir défini une image dans le meta Réalité Unifiée. Vérifiez aussi les droits de fichier.

**Q: Le calcul du prix ne fonctionne pas?**
A: Vérifiez que le prix par nuit est rempli (format nombre)

**Q: La page est mal intégrée au design du site?**
A: Modifiez les classes CSS pour matcher votre design, ou importez votre CSS existant dans `apartment-styles.css`

---

## 📄 NOTES IMPORTANTES

- Tous les textes sont en **FRANÇAIS** et utilisent le text domain `textdomain`
- Au déploiement, remplacez `textdomain` par le vôtre
- Les dates utilisent le format `YYYY-MM-DD` en HTML
- Le prix doit être un nombre (décimal autorisé)
- Les URLs externes s'ouvrent dans un nouvel onglet

---

## 📚 FICHIERS CRÉÉS

1. **functions.php** - CPT + Meta Boxes + Enqueue scripts
2. **archive-apartment.php** - Page liste d'appartements
3. **single-apartment.php** - Page détails appartement
4. **css/apartment-styles.css** - Tous les styles responsifs
5. **js/apartment-booking.js** - Logique de calcul et booking

**Total: 5 fichiers | ~800 lignes de code | Clé en main!**

---

Prêt à partir! Il vous suffit de:
1. Copier/coller le code dans votre theme
2. Ajouter vos appartements
3. Publier son site! 🚀

Bon travail! 💪
