# GUIDE D'IMPLÉMENTATION RAPIDE

## 🎯 En 5 minutes

### 1️⃣ Ouvrez `functions.php` de votre theme
```
/wp-content/themes/votre-theme/functions.php
```
→ Collez TOUT le contenu du fichier `functions.php` généré à la **fin**

### 2️⃣ Créez 2 nouveaux fichiers dans le dossier du theme

**Fichier 1:** `/wp-content/themes/votre-theme/archive-apartment.php`
→ Collez contenu de `archive-apartment.php`

**Fichier 2:** `/wp-content/themes/votre-theme/single-apartment.php`
→ Collez contenu de `single-apartment.php`

### 3️⃣ Créez 2 dossiers

**Dossier 1:** `/wp-content/themes/votre-theme/css/`
→ Placez `apartment-styles.css` dedans

**Dossier 2:** `/wp-content/themes/votre-theme/js/`
→ Placez `apartment-booking.js` dedans

---

## ✅ VÉRIFIATION

1. Allez sur WordPress Admin
2. Cherchez "Appartements" dans le menu de gauche
3. Si c'est là → **Installation réussie!** ✓

---

## 🏠 AJOUTER UN APPARTEMENT

1. Admin → Appartements → Ajouter un appartement
2. Remplissez les infos:
   - Titre: "Appartement 2Ch Anfa"
   - Image: Upload une image
   - Localisation: "Centre-ville, Casablanca"
   - Prix: "450"
   - Personnes: "4"
   - Chambres: "2"
   - Lits: "2"
   - Salles de bain: "1"
   - Évaluation: "4.8"
   - Avis: "42"
3. Publiez

---

## 📍 URLs GÉNÉRÉES

- **Liste**: (votresite).com/apartments/
- **Détails**: (votresite).com/apartments/nom-logement/

---

## 📊 ARCHITECTURE

```
functions.php
├── register_apartment_post_type()      ← CPT
├── apartment_add_meta_boxes()          ← Formulaires admin
├── apartment_meta_box_callback()       ← Affichage champs
├── save_apartment_meta_fields()        ← Sauvegarde données
└── apartment_enqueue_scripts()         ← Charge CSS/JS

archive-apartment.php
├── Boucle WP de la CPT
├── Grid responsive (CSS)
└── Cards avec boutons

single-apartment.php
├── Affichage détails (gauche)
├── Calcul prix (JS)
└── Booking card sticky (droite)

apartment-styles.css
├── Layout responsive
├── Cards design
└── Booking form

apartment-booking.js
├── Date validation
├── Price calculation
└── Button redirect
```

---

## 🎨 COULEURS

**Main:** `#ff6a00` (Orange)
**Text:** `#333`
**Gray:** `#f9f9f9`

Pour changer → Modifiez dans `apartment-styles.css` ligne ~15

---

## ⚡ BONUS: PERSONNALISATION

### Changer la couleur
`apartment-styles.css` → Cherchez `--primary-color: #ff6a00;`

### Ajouter des champs
`functions.php` → Dans la fonction `apartment_meta_boxes_callback()`, ajoutez vos champs

### Modifier le texte
Tous les strings utilisent WPML/Polylang ready avec `__('Text', 'textdomain')`

---

## 🚀 PRÊT?

Suivez les 3 étapes ci-dessus et vous avez un site de location d'appartements professionnel!

Questions? Vérifiez le `README.md` complet.

Bon code! 💻
