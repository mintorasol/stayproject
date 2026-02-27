# ✅ CHECKLIST D'INSTALLATION

Utilisez cette checklist pour vérifier que toute l'installation s'est bien déroulée.

---

## 📋 AVANT L'INSTALLATION

- [ ] Vous avez un WordPress fonctionnel
- [ ] Vous avez accès à FTP/SFTP ou au gestionnaire de fichiers
- [ ] Vous connaissez où est situé votre thème WordPress

---

## 📁 INSTALLATION DES FICHIERS

### Étape 1: functions.php
- [ ] J'ai ouvert mon fichier `functions.php` existant
- [ ] J'ai **collez le contenu du nouveau functions.php À LA FIN** du fichier
- [ ] J'ai sauvegardé le fichier
- [ ] Je ne l'ai pas remplacé en intégralité (erreur courante!)

### Étape 2: Templates
- [ ] J'ai créé `archive-apartment.php` dans mon dossier de thème
- [ ] J'ai créé `single-apartment.php` dans mon dossier de thème
- [ ] Les deux fichiers contiennent le code correct
- [ ] J'ai sauvegardé les deux fichiers

### Étape 3: CSS & JS
- [ ] J'ai créé le dossier `/css/` dans mon thème
- [ ] J'ai placé `apartment-styles.css` dans `/css/`
- [ ] J'ai créé le dossier `/js/` dans mon thème
- [ ] J'ai placé `apartment-booking.js` dans `/js/`

---

## ✅ VÉRIFICATION WORDPRESS

### Admin Dashboard
- [ ] Je vois "Appartements" dans le menu de gauche
- [ ] Le menu a une icône de bâtiment (🏢)
- [ ] Je peux cliquer sur "Ajouter un appartement"

### Formulaire d'ajout
- [ ] Je vois le champ "Titre"
- [ ] Je vois le champ "Éditeur"
- [ ] Je vois le métabox "Détails de l'appartement"
- [ ] Dans le métabox, je vois tous ces champs:
  - [ ] Localisation
  - [ ] Prix par nuit
  - [ ] Nombre de personnes
  - [ ] Chambres
  - [ ] Lits
  - [ ] Salles de bain
  - [ ] Évaluation
  - [ ] Nombre d'avis
  - [ ] URL de référence

---

## 🏠 TEST AVEC UN APPARTEMENT

### Créer un test
1. [ ] J'ai cliqué "Ajouter un appartement"
2. [ ] J'ai rempli le titre: "TEST - Appartement 1"
3. [ ] J'ai rempli la localisation: "Test Location"
4. [ ] J'ai entré le prix: "450"
5. [ ] J'ai entré les autres champs (4, 2, 2, 1, 4.8, 42)
6. [ ] J'ai mis une image
7. [ ] J'ai cliqué "Publier"

### Vérifier l'affichage
- [ ] Je vais sur `/apartments/` et je vois ma carte
- [ ] La carte contient:
  - [ ] L'image
  - [ ] Le titre
  - [ ] La localisation
  - [ ] Le prix
  - [ ] L'évaluation
  - [ ] Le bouton "Voir le logement"
- [ ] Je clique sur la carte → La page de détails se charge

---

## 🎯 PAGE DE DÉTAILS (Single)

### Structure
- [ ] Je vois le breadcrumb: "Appartements / TEST - Appartement 1"
- [ ] Je vois la grande image
- [ ] Je vois le titre
- [ ] Je vois 2 colonnes (gauche/droite)

### Colonne Gauche
- [ ] Je vois la localisation avec l'icône 📍
- [ ] Je vois  les 3 icônes d'équipements (🛏️ 🛌 🚿)
- [ ] Je vois l'évaluation 4.8/5
- [ ] Je vois la description

### Colonne Droite (Booking Card)
- [ ] Je vois "450 DH par nuit"
- [ ] Je vois le champ "Arrivée" (date input)
- [ ] Je vois le champ "Départ" (date input)
- [ ] Je vois le champ "Personnes" (number input)
- [ ] Je vois la section "Nuits: 0"
- [ ] Je vois la section "Total: 0 DH"
- [ ] Je vois le bouton "Réserver maintenant"

---

## ⚡ TEST INTERACTIVITÉ

### Calcul du prix
1. [ ] Je sélectionne une date d'arrivée (ex: 1er mars)
2. [ ] Je sélectionne une date de départ (ex: 3 mars) - 2 nuits
3. [ ] Je vois "Nuits: 2" qui s'affiche
4. [ ] Je vois "Total: 900 DH" (450 × 2) qui s'affiche

### Validation des dates
- [ ] Si je choisis départ < arrivée, le calcul ne se fait pas
- [ ] Si je supprime une date, le total devient 0

### Bouton de réservation
- [ ] Je clique le bouton "Réserver maintenant"
- [ ] S'il y a une URL définie → Nouvelle fenêtre s'ouvre
- [ ] S'il n'y a pas d'URL → Message d'erreur approprié

---

## 📱 TEST RESPONSIVE

### Desktop (1200px+)
- [ ] 3 colonnes sur la page d'archive
- [ ] Layout 2 colonnes (contenu + booking) sur single
- [ ] Booking card stickY au scroll

### Tablette (768px)
- [ ] 2 colonnes sur la page d'archive
- [ ] Layout adapté

### Mobile (480px)
- [ ] 1 colonne sur la page d'archive
- [ ] Layout empilé (contenu en haut, booking en bas)
- [ ] Tout est lisible et cliquable

---

## 🎨 DESIGN & COULEURS

- [ ] Les cards ont une ombre subtile
- [ ] Les boutons sont orange (#ff6a00)
- [ ] Le hover sur les cartes fait translater vers le haut
- [ ] Les inputs ont une jolie animation au focus
- [ ] La police est propre et lisible (Poppins)

---

## 🐛 DÉPANNAGE

Si quelque chose ne fonctionne pas:

### "Appartements" n'apparaît pas en admin?
- [ ] Vérifiez que vous avez bien ajouté le code à functions.php
- [ ] Essayez de réactiver votre thème
- [ ] Videz le cache (si vous en utilisez un)

### Les champs meta ne s'affichent pas?
- [ ] Vérifiez que le code de save_apartment_meta_fields() est présent
- [ ] Essayez d'actualiser la page d'ajout

### Les images ne s'affichent pas?
- [ ] Vérifiez que vous avez mis une image dans "Définir l'image de la une"
- [ ] Vérifiez les permissions de fichier sur `/wp-content/uploads/`

### Le calcul du prix ne fonctionne pas?
- [ ] Vérifiez que apartment-booking.js est chargé (inspectez dans DevTools)
- [ ] Vérifiez que le prix est un nombre (ex: 450, pas "450 DH")
- [ ] Vérifiez dans la console du navigateur s'il y a des erreurs

### La page a une mauvaise apparence?
- [ ] Vérifiez que apartment-styles.css est chargé
- [ ] Vérifiez dans les Sources du Dev Tools que la feuille de style est présente
- [ ] Videz le cache du navigateur (Ctrl+Maj+Suppr)

---

## ✨ C'EST BON!

Si vous avez coché tous les ✅, votre installation est **COMPLÈTE ET FONCTIONNELLE**!

Prochaines étapes:
1. Ajouter les 15 appartements
2. Ajouter des images de qualité
3. Écrire des descriptions détaillées
4. Ajouter les évaluations réalistes
5. Mettre en ligne! 🚀

---

## 📞 BESOIN D'AIDE?

Consultez:
- **README.md** - Guide complet
- **QUICK_START.md** - Installation rapide
- **STRUCTURE_EXEMPLE.html** - Architecture visuelle

Bon travail! 💪
