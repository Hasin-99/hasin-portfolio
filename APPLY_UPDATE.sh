#!/usr/bin/env bash
set -euo pipefail

# Foolproof apply for hasin-portfolio field-note + sitemap update.
# Run from anywhere on your Mac:
#   bash APPLY_UPDATE.sh
# Or after extracting the tarball into ~/hasin-portfolio:
#   cd ~/hasin-portfolio && bash APPLY_UPDATE.sh

REPO="${HASIN_PORTFOLIO_DIR:-$HOME/hasin-portfolio}"

if [ ! -d "$REPO/.git" ]; then
  echo "ERROR: repo not found at: $REPO"
  echo "Set it first, e.g.:"
  echo "  export HASIN_PORTFOLIO_DIR=\"/path/to/hasin-portfolio\""
  exit 1
fi

cd "$REPO"
echo "Using repo: $REPO"

# If this script is inside an extracted update, files are already here.
# Otherwise find the newest matching tarball in Downloads/Desktop/tmp.
if [ ! -f "resources/views/pages/work-show.blade.php" ] || ! grep -q "case-note" resources/views/pages/work-show.blade.php 2>/dev/null; then
  CANDIDATE=""
  for dir in "$HOME/Downloads" "$HOME/Desktop" "/tmp"; do
    [ -d "$dir" ] || continue
    found="$(ls -t "$dir"/hasin-final-check.tar.gz "$dir"/hasin-full-audit-fix.tar.gz "$dir"/hasin-*.tar.gz 2>/dev/null | head -1 || true)"
    if [ -n "${found:-}" ] && [ -f "$found" ]; then
      CANDIDATE="$found"
      break
    fi
  done
  if [ -z "${CANDIDATE:-}" ]; then
    echo "ERROR: could not find hasin-*.tar.gz in Downloads, Desktop, or /tmp"
    echo "Download https://gofile.io/d/yt1HgX first, then re-run."
    exit 1
  fi
  echo "Extracting: $CANDIDATE"
  tar -xzf "$CANDIDATE" -C "$REPO"
fi

# Sanity checks before commit
test -f resources/views/pages/work-show.blade.php
grep -q "case-note" resources/views/pages/work-show.blade.php
grep -q "All rights reserved" resources/views/layouts/app.blade.php
test -f app/Console/Commands/BuildSitemap.php
test -f database/data/project_thinking.php

git add -A
if git diff --cached --quiet; then
  echo "No new file changes to commit (maybe already applied). Pushing anyway if needed."
else
  git commit -m "Final field-note pages, sitemap, and audit fixes"
fi

git push origin main
echo ""
echo "DONE. Next:"
echo "1) Render dashboard -> Manual Deploy -> Deploy latest commit"
echo "2) Open a private window and hard refresh (Cmd+Shift+R)"
echo "3) Check a project page: Field note only, no repeated hero line, no Project notes"
echo "4) Check /sitemap.xml has /works/ links"
