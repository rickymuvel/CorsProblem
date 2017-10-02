ALTER TABLE `pr_justificaciones` ADD UNIQUE `unique_index`(`id_pr_resultado`, `id_justificacion`, `id_cartera`);
ALTER TABLE `pr_tipo_contacto` ADD UNIQUE `unique_index`(`id_pr_resultado`, `id_tipo_contacto`, `id_cartera`);
