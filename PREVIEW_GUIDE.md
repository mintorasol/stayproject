# 🎨 PREVIEW DESIGNS - SEE YOUR WEBSITE LOCALLY

## 📂 Preview Files Created

I've created 2 standalone HTML files that you can open directly in your browser **without needing WordPress or any server setup**.

### Files:
1. **[archive-preview.html](archive-preview.html)** - List view (grid of apartments)
2. **[single-preview.html](single-preview.html)** - Detail view (single apartment + booking card)

---

## 🚀 HOW TO VIEW

### Option 1: Double-click the file (Windows)
1. Go to: `C:\Users\hp\Desktop\rent appt\`
2. **Double-click** `archive-preview.html` → Opens in your browser
3. Click any apartment card to see the detail page

### Option 2: Open with File Explorer
1. Right-click `archive-preview.html`
2. Select "Open with" → Choose your browser
3. Same for `single-preview.html`

### Option 3: Drag & Drop
1. Drag `archive-preview.html` into your browser window
2. Release to open

---

## ✨ PREVIEW FEATURES

### Archive Page (List View)
- ✓ Hero section with title
- ✓ 6 sample apartments in responsive grid
- ✓ Cards with images, titles, location, rating, price
- ✓ "Voir le logement" button (links to detail)
- ✓ Responsive: 3 columns (desktop) → 2 columns (tablet) → 1 column (mobile)

### Single Page (Detail View)
- ✓ Breadcrumb navigation
- ✓ Large featured image
- ✓ Title + location + guest count
- ✓ 3 amenity icons (bedrooms, beds, bathrooms)
- ✓ Rating section (4.8/5 stars)
- ✓ Full description text
- ✓ **Interactive booking card** (RIGHT SIDE):
  - Date picker for check-in
  - Date picker for check-out
  - Guest count input
  - **Real-time price calculation** (try it!)
  - "Réserver maintenant" button
- ✓ Sticky sidebar (stays visible when scrolling)

---

## 🔄 INTERACTIVE FEATURES (Single Page)

Try these on the single-preview.html:

### 1. **Price Calculation**
- Select check-in date: e.g., **2026-03-01**
- Select check-out date: e.g., **2026-03-05** (4 nights)
- Watch the "Total" update automatically! (4 nights × 450 DH = 1800 DH)

### 2. **Date Validation**
- If you try to select checkout BEFORE checkin, it won't work
- Min date is always TODAY

### 3. **Guest Limit**
- Try entering more than 4 guests → auto-corrects to 4

### 4. **Booking Button**
- Click the orange button → Shows a confirmation message with your reservation details

---

## 📊 RESPONSIVE TEST

### Test on Different Screen Sizes:

**Desktop (1200px+):**
- Press `F12` in browser → Open DevTools
- Go to Device toolbar (top-left)
- Select "Responsive" or any desktop device
- See 3-column grid on archive, 2-column layout on single

**Tablet (768px):**
- Select "iPad" in DevTools
- See 2-column grid, responsive sidebar

**Mobile (480px):**
- Select "iPhone 12" in DevTools
- See 1-column grid, stacked layout

**Or:**
- Resize browser window manually and watch it adapt!

---

## 🎨 DESIGN PREVIEW

### Colors Used:
- **Primary**: #ff6a00 (Orange) - buttons, titles, highlights
- **Text**: #333 (Dark gray)
- **Background**: #f9f9f9 (Light gray)

### Font:
- **Poppins** (Google Fonts) - clean, modern

### Components:
- Cards with subtle shadows and hover effects
- Orange buttons with smooth transitions
- Sticky sidebar that follows on scroll
- Smooth animations on interaction

---

## ✅ WHAT THIS SHOWS YOU

These previews demonstrate:

1. **Layout & Structure** - How content is organized
2. **Design System** - Colors, fonts, spacing
3. **Responsiveness** - Looks good on all devices
4. **Interactions** - Calculate price, select dates
5. **User Experience** - Clean, modern, professional

---

## 📌 NEXT STEPS

### Once you're satisfied with the design:

1. Move to WordPress setup (see `LOCALHOST_SETUP.md`)
2. The actual WordPress version will:
   - Use your real apartment data from the database
   - Have admin interface to add/edit apartments
   - Include all WordPress features (comments, SEO, etc.)

### Sample Data in Previews:
- ✓ 6 test apartments with real-looking info
- ✓ Real images from Unsplash
- ✓ Realistic prices and ratings
- ✓ French text throughout

---

## 🔧 CUSTOMIZE THE PREVIEW

You can edit the HTML files to:
- Change colors (search for `#ff6a00`)
- Add more apartments (copy/paste card blocks)
- Change prices or descriptions
- Modify amenities

Just open with a text editor (VS Code, Notepad, etc.)

---

## 📞 TIPS

- **No internet needed?** Images use Unsplash CDN, needs internet
- **Want to test offline?** Replace image URLs with local files
- **Want to see validation?** Try invalid dates on the booking form
- **Want to test responsiveness?** Open DevTools `F12` → Mobile view

---

## 🎉 YOU'RE READY!

1. ✅ **Open archive-preview.html** in your browser NOW
2. ✅ **Click any apartment** to see the detail view
3. ✅ **Play with the booking** to see calculations work
4. ✅ **Resize your window** to test mobile responsiveness

**Your design is production-ready!** 🚀

Once you're happy, proceed to WordPress setup to make it dynamic.

---

**Questions?** Check the other documentation files:
- `README.md` - Full installation guide
- `LOCALHOST_SETUP.md` - WordPress setup
- `RESUME_TECHNIQUE.md` - Technical details
