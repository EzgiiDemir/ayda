"use client";
import Link from "next/link";
import { useState } from "react";
import LanguageSwitcher from "./LanguageSwitcher";
import Container from "./ui/Container";
import type { MenuDTO } from "@/lib/cms";

export default function NavbarClient({
                                         locale,
                                         menu,
                                     }: { locale: "tr" | "en"; menu: MenuDTO }) {
    const [open, setOpen] = useState(false);

    return (
        <header className="border-b bg-white/80 backdrop-blur">
            <Container className="h-16 flex items-center justify-between">
                <Link href={`/${locale}`} className="font-semibold">{menu.brand}</Link>

                <nav className="hidden md:flex gap-6 text-sm">
                    {menu.items.map(i => (
                        <Link key={i.href} href={i.href} className="hover:underline">{i.label}</Link>
                    ))}

                    {menu.treatments?.length ? (
                        <div className="relative group">
              <span className="cursor-pointer">
                {locale === "tr" ? "Tedaviler" : "Treatments"}
              </span>
                            <ul className="absolute top-full left-0 bg-white border rounded shadow opacity-0 invisible group-hover:opacity-100 group-hover:visible transition mt-2 min-w-[240px]">
                                {menu.treatments.map(s => (
                                    <li key={s.href}>
                                        <Link href={s.href} className="block px-4 py-2 hover:bg-gray-50">
                                            {s.label}
                                        </Link>
                                    </li>
                                ))}
                            </ul>
                        </div>
                    ) : null}
                </nav>

                <div className="flex items-center gap-4">
                    <LanguageSwitcher locale={locale}/>
                    <button
                        className="md:hidden size-9 grid place-items-center border rounded"
                        onClick={() => setOpen(v => !v)}
                        aria-label="Menu"
                    >
                        ☰
                    </button>
                </div>
            </Container>

            {open && (
                <div className="md:hidden border-t">
                    <Container className="py-3">
                        <ul className="flex flex-col gap-3">
                            {menu.items.map(i => (
                                <li key={i.href}>
                                    <Link href={i.href} onClick={() => setOpen(false)}>{i.label}</Link>
                                </li>
                            ))}
                            {menu.treatments?.length ? (
                                <>
                                    <li className="pt-2 font-medium">
                                        {locale === "tr" ? "Tedaviler" : "Treatments"}
                                    </li>
                                    {menu.treatments.map(s => (
                                        <li key={s.href} className="pl-3">
                                            <Link href={s.href} onClick={() => setOpen(false)}>{s.label}</Link>
                                        </li>
                                    ))}
                                </>
                            ) : null}
                        </ul>
                    </Container>
                </div>
            )}
        </header>
    );
}
