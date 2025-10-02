import { Locale, getOurTeam } from "@/lib/cms";
import Team from "@/components/ui/Team";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getOurTeam(params.locale, "hakkimizda/takimimiz");
    return <Team data={data} />;
}
