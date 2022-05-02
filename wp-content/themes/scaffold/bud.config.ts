import type { Framework } from "@roots/bud";

export default function (app: Framework): void {
  app.provide({
    jquery: "$",
  });

  app.entry({
    alpine: ["alpinejs"],
    common: {
      import: ["common.js", "common.scss"],
      dependsOn: ["alpine"],
    },
    archive: {
      import: ["archive.js"],
      dependsOn: ["common"],
    },
    front: {
      import: ["front.js"],
      dependsOn: ["common"],
    },
    page: {
      import: ["page.js"],
      dependsOn: ["common"],
    },
    single: {
      import: ["single.js"],
      dependsOn: ["common"],
    },
  });

  app.when(
    app.isProduction,
    () => app.hash().minimize(),
    () => app.devtool()
  );
}
