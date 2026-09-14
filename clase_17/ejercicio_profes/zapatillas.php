<?php
/* pseudo-base de datos de zapatillas */
$zapatillas = [
  [
    "marca" => "nike",
    "modelos" => [
      [
        "id" => "nike-dunk-low",
        "nombre" => "Nike Dunk Low",
        "precio" => 100,
        "descripcion" => "El icono del basquetbol de los 80, que se creó para la cancha pero conquistó las calles.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Blanco", "Negro", "Rojo"],
        "imagen" => "https://nikearprod.vtexassets.com/arquivos/ids/378649-1200-1200?width=1200&height=1200&aspect=true"
      ],
      [
        "id" => "air-jordan-1-low-se",
        "nombre" => "Air Jordan 1 Low SE",
        "precio" => 120,
        "descripcion" => "Da tu máximo esfuerzo con estos AJ1 de edición especial.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Negro", "Blanco", "Azul"],
        "imagen" => "https://nikearprod.vtexassets.com/arquivos/ids/1460993-1200-1200?width=1200&height=1200&aspect=true"
      ],
      [
        "id" => "nike-pegasus-trail-5",
        "nombre" => "Nike Pegasus Trail 5",
        "precio" => 130,
        "descripcion" => "Despliega tus alas y observa lo que te depara la naturaleza mientras recorres caminos de tierra con los Peg Trail 5.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Verde", "Gris", "Azul"],
        "imagen" => "https://nikearprod.vtexassets.com/arquivos/ids/1381241-1200-1200?width=1200&height=1200&aspect=true"
      ]
    ]
  ],
  [
    "marca" => "adidas",
    "modelos" => [
      [
        "id" => "adidas-ultraboost",
        "nombre" => "Adidas Ultraboost",
        "precio" => 110,
        "descripcion" => "Zapatillas de running con amortiguación superior para máxima comodidad en cada paso.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Negro", "Blanco", "Gris"],
        "imagen" => "https://assets.adidas.com/images/w_600,f_auto,q_auto/d2a64cf9cd824e5d9fcc950b5eb0b2c8_9366/Zapatillas_Ultraboost_5_Azul_ID8817_HM1.jpg"
      ],
      [
        "id" => "adidas-stan-smith",
        "nombre" => "Adidas Stan Smith",
        "precio" => 90,
        "descripcion" => "Clásicas zapatillas blancas con diseño atemporal, perfectas para el día a día.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Blanco", "Verde"],
        "imagen" => "https://assets.adidas.com/images/w_600,f_auto,q_auto/69721f2e7c934d909168a80e00818569_9366/Zapatillas_Stan_Smith_Blanco_M20324_01_standard.jpg"
      ],
      [
        "id" => "adidas-nmd",
        "nombre" => "Adidas NMD",
        "precio" => 105,
        "descripcion" => "Zapatillas urbanas con tecnología Boost para un estilo moderno y cómodo.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Negro", "Blanco", "Azul"],
        "imagen" => "https://cdn-images.farfetch-contents.com/14/86/22/44/14862244_24360902_600.jpg"
      ],
      [
        "id" => "adidas-aloha",
        "nombre" => "Adidas Aloha",
        "precio" => 175,
        "descripcion" => "Zapatillas urbanas con tecnología Boost para un estilo moderno y cómodo.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Negro", "Blanco", "Azul"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ]
    ]
  ],
  [
    "marca" => "topper",
    "modelos" => [
      [
        "id" => "topper-runner",
        "nombre" => "Topper Runner",
        "precio" => 85,
        "descripcion" => "Zapatillas ligeras ideales para corredores diarios con excelente ventilación.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Azul", "Rojo", "Negro"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ],
      [
        "id" => "topper-classic",
        "nombre" => "Topper Classic",
        "precio" => 75,
        "descripcion" => "Diseño clásico y versátil para uso cotidiano, con materiales duraderos.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Blanco", "Negro"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ],
      [
        "id" => "topper-sport",
        "nombre" => "Topper Sport",
        "precio" => 95,
        "descripcion" => "Zapatillas deportivas multifuncionales para actividades al aire libre.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Verde", "Azul", "Gris"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ]
    ]
  ],
  [
    "marca" => "newbalance",
    "modelos" => [
      [
        "id" => "newbalance-574",
        "nombre" => "NewBalance 574",
        "precio" => 100,
        "descripcion" => "Zapatillas icónicas con estilo retro y comodidad para el uso diario.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Azul Marino", "Gris"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ],
      [
        "id" => "newbalance-990",
        "nombre" => "NewBalance 990",
        "precio" => 150,
        "descripcion" => "Modelo premium con amortiguación avanzada y diseño elegante.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Negro", "Blanco"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ],
      [
        "id" => "newbalance-fuelcell",
        "nombre" => "NewBalance FuelCell",
        "precio" => 140,
        "descripcion" => "Zapatillas de alto rendimiento para atletas con energía de retorno.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Rojo", "Azul"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ]
    ]
  ],
  [
    "marca" => "jaguar",
    "modelos" => [
      [
        "id" => "jaguar-speed",
        "nombre" => "Jaguar Speed",
        "precio" => 120,
        "descripcion" => "Zapatillas rápidas y ligeras para competiciones de velocidad.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Amarillo", "Negro"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ],
      [
        "id" => "jaguar-comfort",
        "nombre" => "Jaguar Comfort",
        "precio" => 80,
        "descripcion" => "Diseñadas para máxima comodidad durante todo el día.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Rosa", "Blanco"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ],
      [
        "id" => "jaguar-elite",
        "nombre" => "Jaguar Elite",
        "precio" => 160,
        "descripcion" => "Zapatillas premium para atletas de élite con tecnología avanzada.",
        "talles" => [36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
        "colores" => ["Plateado", "Negro"],
        "imagen" => "https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/c40af072627a446aa200a84c7d07021f_9366/Aloha_Super_Beige_JQ1043_01_00_standard.jpg"
      ]
    ]
  ]
];
