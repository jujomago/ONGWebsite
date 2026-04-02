Create a custom WordPress theme for a nonprofit NGO called “Fundación Alimentando Sonrisas (FAS)”.

The theme must be structured based on the following navigation menu:
algo mas
MAIN MENU:
- Inicio
- Quiénes somos
- Cómo ayudamos (dropdown)
    - Alimentación
    - Salud
    - Educación
    - Emprendimiento
- Comunidades
- Nuestro equipo
- Participa
- Apóyanos (highlighted CTA button)
- Contacto

----------------------------------
REQUIRED PHP TEMPLATE FILES
----------------------------------

Use WordPress template hierarchy properly.

1. GLOBAL FILES:

- style.css (theme definition)
- functions.php (enqueue styles/scripts, register menus, CPT, taxonomies)
- header.php (navbar with dropdown and CTA button “Apóyanos”)
- footer.php (contact info, social links, WhatsApp)

----------------------------------

2. HOMEPAGE (LANDING)

- front-page.php

This should contain:
- Hero with slider
- Problem section
- Cómo ayudamos (cards)
- Comunidades preview
- Testimonial/story
- Cómo ayudar (donar + participar)
- CTA final

----------------------------------

3. STATIC PAGES

Create specific templates using slug-based naming:

- page-quienes-somos.php
- page-como-ayudamos.php
- page-comunidades.php
- page-nuestro-equipo.php
- page-participa.php
- page-apoyanos.php
- page-contacto.php

----------------------------------

4. SUBPAGES (UNDER "CÓMO AYUDAMOS")

Each submenu item must have its own page template:

- page-alimentacion.php
- page-salud.php
- page-educacion.php
- page-emprendimiento.php

Each page should:
- explain the program
- display related “proyectos” dynamically

----------------------------------

5. CUSTOM POST TYPE: PROYECTOS

Register a Custom Post Type:

Name:
- singular: Proyecto
- plural: Proyectos
- slug: proyectos

----------------------------------

6. CUSTOM TAXONOMY

Create taxonomy:

- name: tipo_programa
- values:
    - alimentacion
    - salud
    - educacion
    - emprendimiento

----------------------------------

7. CPT TEMPLATE FILES

- archive-proyecto.php → list all projects
- single-proyecto.php → individual project detail

----------------------------------

8. OPTIONAL (RECOMMENDED)

- page.php (fallback template)
- single.php (fallback)
- archive.php (fallback)

----------------------------------

FUNCTIONS.PHP REQUIREMENTS
----------------------------------

- Register navigation menu (primary menu)
- Enqueue styles and scripts
- Register Custom Post Type “proyectos”
- Register taxonomy “tipo_programa”
- Enable featured images (post thumbnails)

----------------------------------

HEADER.PHP REQUIREMENTS
----------------------------------

- Logo (left)
- Navigation menu (center/right)
- Dropdown for “Cómo ayudamos”
- Highlight “Apóyanos” as button
- Sticky behavior (CSS/JS ready)

----------------------------------

FOOTER.PHP REQUIREMENTS
----------------------------------

- Contact info
- WhatsApp link/button
- Social media links
- Secondary navigation
- Copyright

----------------------------------

DYNAMIC CONTENT REQUIREMENTS
----------------------------------

- In each program page (Alimentación, Salud, etc.):
  Query and display projects filtered by taxonomy “tipo_programa”

----------------------------------

DESIGN NOTES
----------------------------------

- Clean, modern NGO style
- Light colors with soft green as primary
- Responsive design
- Smooth UX

----------------------------------

IMPORTANT
----------------------------------

- Follow WordPress best practices
- Use semantic HTML
- Keep templates modular (get_header(), get_footer())
- Prepare for scalability