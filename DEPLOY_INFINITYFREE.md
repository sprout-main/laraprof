# Deploying to InfinityFree (sprout.free.nf)

This folder is the full Laravel app. InfinityFree forces you to upload into `htdocs/`
(document root cannot be changed). Two release files are included under VISIBLE names
on purpose, because InfinityFree tends to delete literal hidden `.env` / `.htaccess`
files that are uploaded as dotfiles. Rename them in the InfinityFree File Manager
AFTER upload.

## Steps

1. Upload the whole contents of this folder into the `htdocs/` folder of your
   InfinityFree account (root of the account, directly under htdocs, not inside a subfolder).
2. In the InfinityFree File Manager, rename:
   - `htdocs.htaccess`  ->  `.htaccess`   (at the root of htdocs)
   - `.env.infinityfree` ->  `.env`       (at the root of htdocs)
3. The root `.htaccess` rewrite-redirects every request into `/public/`, so the site
   serves from `public` while the full Laravel structure stays intact.
4. Done. No composer, no npm, no database setup required.
