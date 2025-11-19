// Suprime warnings de CSS de terceros en la consola
(function() {
  'use strict';

  // Lista de warnings a suprimir
  const suppressedWarnings = [
    '-moz-column-gap',
    '-moz-osx-font-smoothing',
    '-webkit-text-size-adjust',
    '-moz-text-size-adjust',
    'text-size-adjust',
    '-moz-focus-inner',
    '-moz-focus-outer',
    'Glyph bbox was incorrect'
  ];

  // Sobrescribir console.warn
  const originalWarn = console.warn;
  console.warn = function(...args) {
    const message = args.join(' ');
    const shouldSuppress = suppressedWarnings.some(warning =>
      message.includes(warning)
    );

    if (!shouldSuppress) {
      originalWarn.apply(console, args);
    }
  };

  // Sobrescribir console.error para warnings de CSS
  const originalError = console.error;
  console.error = function(...args) {
    const message = args.join(' ');
    const shouldSuppress = suppressedWarnings.some(warning =>
      message.includes(warning)
    );

    if (!shouldSuppress) {
      originalError.apply(console, args);
    }
  };
})();
