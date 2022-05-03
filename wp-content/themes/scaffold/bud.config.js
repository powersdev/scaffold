module.exports = function (app) {
  app.setPath(
    {
      '@src': 'resources/assets',
      '@dist': 'public',
      '@storage': 'public/storage'
    },
  )

  app.entry(
    {
      app: {
        import: ['app.ts', 'app.css'],
      },
    },
  )

  app.when(
    app.isProduction,
    () => app.minimize(),
    () => app.devtool(),
  )
}
