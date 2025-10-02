// src/app/[locale]/layout.tsx
import "../globals.css";
import type { Locale } from "@/lib/cms";
import NavBar from "@/components/site/NavBar";
import FooterServer from "@/components/site/FooterServer";

export default async function LocaleLayout({
                                               children,
                                               params,
                                           }: {
    children: React.ReactNode;
    params: { locale: Locale };
}) {
    const locale = params.locale;

    return (
        <html lang={locale}>
        <body className="min-h-dvh flex flex-col">
        <NavBar locale={locale} />
        <div className="flex-1 flex flex-col">{children}</div>
        <FooterServer locale={locale} />
        </body>
        </html>
    );
}
