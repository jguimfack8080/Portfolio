// Sélectionne la balise de navigation et les liens de navigation
const nav = document.querySelector('nav');
const navLinks = document.querySelectorAll('nav a');

// Ajoute un événement de clic à chaque lien de navigation
navLinks.forEach(link => {
  link.addEventListener('click', e => {
    // Empêche le comportement de lien par défaut
    e.preventDefault();
    // Récupère l'identifiant de section à partir de l'attribut href du lien
    const sectionId = link.getAttribute('href');
    // Défile jusqu'à la section correspondante en douceur
    document.querySelector(sectionId).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

// Ajoute une classe active à l'élément de navigation actuel lorsqu'il est dans la vue
window.addEventListener('scroll', () => {
  const currentSection = document.querySelector('section.active');
  const sections = document.querySelectorAll('section');
  sections.forEach(section => {
    const sectionTop = section.offsetTop - nav.offsetHeight;
    if (window.scrollY >= sectionTop) {
      currentSection.classList.remove('active');
      section.classList.add('active');
    }
  });
});

const projectList = document.getElementById('project-list');

// Initialise le compteur de projet
let projectCounter = 0;

// Itération sur chaque élément de la liste pour ajouter le numéro de projet
for (let i = 0; i < projectList.children.length; i++) {
  projectCounter++;
  const project = projectList.children[i];
  const projectTitle = project.querySelector('h3');
  // Créer un ID unique pour chaque projet
  project.id = 'project-' + projectCounter;
  projectTitle.textContent = 'Projekt ' + projectCounter;
}
// Sélectionne tous les cercles de performance
const performanceCircles = document.querySelectorAll('.circle');

// Génère un tableau de 100 couleurs aléatoires uniques
function generateUniqueColors() {
  let colorArray = [];
  let currentColorObj = {};
  for (let i = 0; i < 200; i++) {
    let color;
    do {
      color = '#' + Math.floor(Math.random() * 16777215).toString(16);
    } while (currentColorObj[color]);
    colorArray.push(color);
    currentColorObj[color] = true;
  }
  return colorArray;
}

// Change la couleur de tous les cercles de performance toutes les trois secondes
setInterval(() => {
  // Parcourt tous les cercles de performance et change leur couleur
  performanceCircles.forEach(circle => {
    // Initialise un tableau de 100 couleurs aléatoires uniques pour ce cercle
    let circleColors = generateUniqueColors();
    // Initialise l'index de couleur actuel pour ce cercle
    let currentColorIndex = 0;
    // Change la couleur de ce cercle toutes les 3 secondes en bouclant sur les couleurs du tableau
    setInterval(() => {
      circle.style.setProperty('--bgColor', circleColors[currentColorIndex]);
      currentColorIndex = (currentColorIndex + 1) % 100;
    }, 2000);
  });
}, 3000); // Change la couleur toutes les 3 secondes
