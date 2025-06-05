# 🎮 Conversor de Coordenadas Minecraft

Un conversor elegante y funcional para transformar coordenadas entre el Overworld y el Nether en Minecraft, con un diseño inspirado en el juego.

## 📁 Estructura del Proyecto

```
src/
├── index.php       # Archivo principal - Interfaz y lógica de presentación
├── converter.php   # Lógica del conversor de coordenadas (Backend)
├── style.css      # Estilos CSS con tema de Minecraft
└── README.md      # Documentación del proyecto
```

## 🔧 Archivos del Proyecto

### `index.php`
- **Propósito**: Archivo principal que maneja la interfaz de usuario
- **Funciones**:
  - Incluye la lógica del conversor
  - Renderiza el formulario HTML
  - Muestra los resultados de conversión
  - Maneja la estructura general de la página

### `converter.php`
- **Propósito**: Contiene toda la lógica de conversión de coordenadas
- **Características**:
  - Variables globales para almacenar datos ($x, $y, $z, $result, $dimension)
  - Funciones para conversión: `overworld_a_nether()` y `nether_a_overworld()`
  - Procesamiento seguro de datos POST
  - Lógica simple y directa sin orientación a objetos

### `style.css`
- **Propósito**: Estilos visuales con tema de Minecraft
- **Características**:
  - Diseño responsivo
  - Animaciones y efectos visuales
  - Paleta de colores temática (verdes neón)
  - Efectos de hover y transiciones
  - Compatibilidad con diferentes navegadores

## 🎯 Funcionalidades

- ✅ **Conversión bidireccional**: Overworld → Nether y viceversa
- ✅ **Interfaz responsiva**: Funciona en desktop y móvil
- ✅ **Validación de datos**: Entrada segura y validada
- ✅ **Diseño temático**: Estilo inspirado en Minecraft
- ✅ **Animaciones fluidas**: Efectos visuales atractivos
- ✅ **Código organizado**: Separación clara de responsabilidades

## 🚀 Cómo usar

1. Coloca todos los archivos en el mismo directorio de tu servidor web
2. Asegúrate de que PHP esté habilitado
3. Accede a `index.php` desde tu navegador
4. Selecciona la dimensión de origen
5. Ingresa las coordenadas X, Y, Z
6. Haz clic en "Convertir"
7. ¡Disfruta de las coordenadas convertidas con estilo!

## 🎨 Características del Diseño

- **Fondo animado** con gradientes verdes
- **Bordes brillantes** con efectos de encantamiento
- **Tipografía futurista** (Orbitron)
- **Efectos de partículas** flotantes
- **Campos interactivos** con hover y focus
- **Resultados destacados** con colores diferenciados
- **Optimizado para una pantalla** sin scroll

## 🔄 Conversiones

- **Overworld → Nether**: Divide X y Z por 8, Y se mantiene
- **Nether → Overworld**: Multiplica X y Z por 8, Y se mantiene

---

*Desarrollado con ❤️ para la comunidad de Minecraft* 