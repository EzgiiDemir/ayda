import Container from "./ui/Container";
import { getPage } from "@/lib/cms";

export default async function Footer({ locale }: { locale: "tr" | "en" }) {
    const contact = await getPage(locale, "iletisim"); // Laravel'den çeker
    const year = new Date().getFullYear();
    return (
        <footer className="mt-12 border-t">
            <Container className="py-10 grid gap-6 md:grid-cols-3 text-sm">
                <div>
                    <div className="font-semibold mb-2">Ayda IVF</div>
                    <div
                        className="opacity-70"
                        dangerouslySetInnerHTML={{ __html: contact?.html ?? "" }}
                    />
                </div>
                <div>
                    <div className="font-semibold mb-2">{locale === "tr" ? "Hızlı Bağlantılar" : "Quick Links"}</div>
                    <ul className="space-y-1 opacity-80">
                        <li><a href={`/${locale}/hakkimizda`}>{locale === "tr" ? "Hakkımızda" : "About"}</a></li>
                        <li><a href={`/${locale}/seyahat`}>{locale === "tr" ? "Seyahat" : "Travel"}</a></li>
                        <li><a href={`/${locale}/sss`}>FAQ</a></li>
                        <li><a href={`/${locale}/iletisim`}>{locale === "tr" ? "İletişim" : "Contact"}</a></li>
                    </ul>
                </div>
                <div className="opacity-70">© {year} Ayda IVF</div>
            </Container>
        </footer>
    );
}
