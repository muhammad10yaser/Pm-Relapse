#!/usr/bin/env python3
"""
Regenerate payloads.json from the payloads/ folder.
Run this before committing to GitHub.
"""

import json
from pathlib import Path

ROOT = Path(__file__).resolve().parent
PAYLOADS_DIR = ROOT / "payloads"
OUT = ROOT / "payloads.json"

ALLOWED_EXT = {"elf"}


def main():
    if not PAYLOADS_DIR.is_dir():
        print(f"[!] {PAYLOADS_DIR} not found")
        return

    files = []
    for p in sorted(PAYLOADS_DIR.iterdir(), key=lambda x: x.name.lower()):
        if not p.is_file():
            continue
        ext = p.suffix.lower().lstrip(".")
        if ext not in ALLOWED_EXT:
            continue
        files.append({
            "name": p.name,
            "size": p.stat().st_size,
            "type": ext,
        })

    OUT.write_text(json.dumps(files, indent=2))
    print(f"[+] wrote {OUT.name} with {len(files)} payload(s)")
    for f in files:
        print(f"    - {f['name']}  ({f['size']} bytes)")


if __name__ == "__main__":
    main()