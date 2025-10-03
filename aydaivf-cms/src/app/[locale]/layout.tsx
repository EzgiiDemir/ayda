import "../globals.css";
import type { Locale } from "@/lib/cms";
import FooterServer from "@/components/site/FooterServer";
import NavbarServer from "@/components/site/NavbarServer";

export default async function LocaleLayout({
                                               children,
                                               params,
                                           }: {
    children: React.ReactNode;
    params: Promise<{ locale: Locale }>;
}) {
    const { locale } = await params;

    return (
        <div data-locale={locale}>
            <NavbarServer locale={locale} />
            <div className="flex-1 flex flex-col">{children}</div>
            <FooterServer locale={locale} />
        </div>
    );
}
